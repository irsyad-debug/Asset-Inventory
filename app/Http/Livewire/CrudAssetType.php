<?php

namespace App\Http\Livewire;

use App\Models\AssetType;
use Livewire\Component;

class CrudAssetType extends Component
{
    public $isModalOpen = 0, $type_name, $type_status;
    public $types, $type_id;
    public function render()
    {
        $this->types = AssetType::all();
        return view('livewire.crud-asset-type');
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
        $this->type_name = '';
        $this->type_status = '';
    }

    public function store()
    {
        AssetType::updateOrCreate(['id' => $this->type_id], [
            'type_name' => $this->type_name,
            'type_status' => $this->type_status,
        ]);

        session()->flash('message', $this->type_id ? 'Asset Type updated.' : 'Asset Type created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $assetType = AssetType::findOrFail($id);
        $this->type_id = $id;
        $this->type_name = $assetType->type_name;
        $this->type_status = $assetType->type_status;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        AssetType::find($id)->delete();
        session()->flash('message', 'Asset Type Has Been Deleted.');
    }

}
