<?php

namespace App\Exports;

use App\EventExhibitor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\Sheets\ExportFormatSheet;

class ExhibitorsExport implements FromCollection, WithMultipleSheets
{
    use Exportable;
    private $event;
    
    public function __construct($event)
    {
        $this->event = $event;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EventExhibitor::all();
    }
    public function sheets(): array
    {
        $sheets = [];

        // for ($month = 1; $month <= 12; $month++) {
        //     $sheets[] = new InvoicesPerMonthSheet($this->year, $month);
        // }
        $sheets['Exhibitors']   = new ExportFormatSheet('Exhibitors','App\EventExhibitor',null,['No', 'Event','Company'], $this->event);
        $sheets['Companies']    = new ExportFormatSheet('Companies','App\Company',['id','company_name','company_web'],['Id','Company','Web'], $this->event);

        return $sheets;
    }
    
}
