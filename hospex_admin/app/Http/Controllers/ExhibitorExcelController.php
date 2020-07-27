<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\ExhibitorsExport;
use App\Imports\ExhibitorsImport;
use Maatwebsite\Excel\Facades\Excel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  
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
        return Excel::download(new ExhibitorsExport(), 'Exhibitors.xlsx');
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
  
}