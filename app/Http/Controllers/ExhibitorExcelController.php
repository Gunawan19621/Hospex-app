<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\ExhibitorsExport;
use App\Imports\ExhibitorsImport;
use Maatwebsite\Excel\Facades\Excel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
  
class ExhibitorExcelController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView($event=null)
    {
       return view('import', compact('event'));
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export($event = null) 
    {
        $event = $event == null ? $this->eventId() : $event ;
        
        return Excel::download(new ExhibitorsExport($event), 'Exhibitors.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        // $import = new ExhibitorsImport();
        // $import->import()
        try {
            $import = new ExhibitorsImport();
            Excel::import($import, request()->file('file'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
          
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }
            // dd($failure->errors());
            return redirect()->back()->withErrors($failure->errors())->with('status','0-Data Failed to Save');
        } 
        return back()->with('status','1-Data Successfull to Saved');
    }
    public function eventId()
    {
        $t      = Carbon::now();
            $event  = DB::table('events')
                    ->select('events.id')
                    ->leftJoin('event_schedules', 'events.id', '=', 'event_schedules.event_id')
                    ->whereDate('events.begin',' >= ',$t)
                    ->orderBy('events.begin')
                    ->first();

        return $event->id;
    }
  
}