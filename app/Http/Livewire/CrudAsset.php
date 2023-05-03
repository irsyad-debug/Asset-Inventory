<?php

namespace App\Http\Livewire;

use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CrudAsset extends Component
{
//    public $students, $name, $serial_number, $model, $asset_id;
    public $name, $serial_number, $model, $asset_id, $date_purchase, $delivery_date, $quantity,
        $asset_type, $asset_status;
    public $isModalOpen = 0, $assets, $types;

    public function render()
    {
        $this->assets = Asset::all();
        $this->types = AssetType::where('type_status', 1)->get();
        return view('livewire.crud-asset');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->name = '';
        $this->serial_number = '';
        $this->asset_id = '';
        $this->model = '';
        $this->date_purchase = '';
        $this->delivery_date = '';
        $this->asset_type = '';
        $this->quantity = '';
        $this->asset_status = '';
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'serial_number' => ['required',Rule::unique('assets')->ignore($this->asset_id)],
            'model' => 'required',
            'date_purchase' => 'required',
            'delivery_date' => 'required',
            'quantity' => 'required',
            'asset_type' => 'required',
            'asset_status' => 'required'
        ]);

        Asset::updateOrCreate(['id' => $this->asset_id], [
            'name' => $this->name,
            'type_id' => $this->asset_type,
            'serial_number' => $this->serial_number,
            'brand' => $this->model,
            'quantity' => $this->quantity,
            'date_purchase' => $this->date_purchase,
            'asset_status' => $this->asset_status,
            'delivery_date' => $this->delivery_date,
        ]);

        session()->flash('message', $this->asset_id ? 'Asset updated.' : 'Asset created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $asset = Asset::findOrFail($id);
        $this->asset_id = $id;
        $this->name = $asset->name;
        $this->serial_number = $asset->serial_number;
        $this->model = $asset->brand;
        $this->date_purchase = $asset->date_purchase;
        $this->delivery_date = $asset->delivery_date;
        $this->asset_type = $asset->type_id;
        $this->quantity = $asset->quantity;
        $this->asset_status = $asset->asset_status;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Asset::find($id)->delete();
        session()->flash('message', 'Asset Has Been Deleted.');
    }

}
