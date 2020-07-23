<?php

namespace App\Exports;

use App\EventExhibitor;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExhibitorsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EventExhibitor::all();
    }
}
