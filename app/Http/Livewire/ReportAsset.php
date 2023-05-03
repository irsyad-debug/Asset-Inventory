<?php

namespace App\Http\Livewire;

use App\Models\Asset;
use Carbon\Carbon;
use Livewire\Component;

class ReportAsset extends Component
{
    public $months, $month = '', $assets = [];

    public function mount()
    {
        $this->months = [
          '1' => 'January',
          '2' => 'February',
          '3' => 'March',
          '4' => 'April',
          '5' => 'May',
          '6' => 'June',
          '7' => 'July',
          '8' => 'August',
          '9' => 'September',
          '10' => 'October',
          '11' => 'November',
          '12' => 'December',
        ];
    }
    public function render()
    {
        if($this->month != null){
            $this->assets = Asset::whereMonth('date_purchase', $this->month)->get();
        }
        return view('livewire.report-asset');
    }


}
