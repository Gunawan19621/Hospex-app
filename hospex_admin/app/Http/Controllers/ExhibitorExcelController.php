<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\ExhibitorsExport;
use App\Imports\ExhibitorsImport;
use Maatwebsite\Excel\Facades\Excel;
  
class ExhibitorExcelController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ExhibitorsExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        // $import = new ExhibitorsImport();
        // $import->import()
        try {
            Excel::import(new ExhibitorsImport(), request()->file('file'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $row=[];
            $values=[];
            $head=[];
            $msg=[];
            $f=[];
            foreach ($failures as $failure) {
                $row[]      = $failure->row(); // row that went wrong
                $head[]     = $failure->attribute(); // either heading key (if using heading row concern) or column index
                $msg[]      = $failure->errors(); // Actual error messages from Laravel validator
                $values[]   = $failure->values(); // The values of the row that has failed.
                $f[]        = [$row,$head,$msg,$values];
            }
            dd($f);
        } 
        return back();
    }
}