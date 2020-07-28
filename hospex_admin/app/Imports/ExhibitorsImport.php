<?php

namespace App\Imports;

use App\EventExhibitor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ExhibitorsImport implements ToModel, WithStartRow, WithHeadingRow, WithValidation, WithMultipleSheets, WithCalculatedFormulas
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new EventExhibitor([
            'event_id'          => $row['event'],
            'company_id'        => $row['company'], 
            'api_token'         => '',
            'reset_token'       => '',
            'device_token'       => '',
            'password' => Hash::make('password'),
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
    // public function headingRow(): int
    // {
    //     return 1;
    // }
    public function rules(): array
    {
        return [
            '*.company' => 'required', // Table name, field in your db
            '*.event' => 'required', // Table name, field in your db
        ];
    }

    // public function customValidationMessages()
    // {
    //     return [
    //         '1.required' => 'Custom message',
    //         '2.required' => 'Custom message',
    //     ];
    // }
    // public function collection(Collection $rows)
    // {
    //     Validator::make($rows->toArray(), [
    //         '*.company' => 'required',
    //         '*.event' => 'required',
    //     ])->validate();
    //     foreach ($rows as $row) 
    //     {
    //         EventExhibitor::create([
    //             'event_id'     => $row[1],
    //             'company_id'    => $row[2], 
    //             'api_token'     => '',
    //             'reset_token'     => '',
    //             'password' => Hash::make('password'),
    //         ]);
    //     }
    // }
    // public function onFailure(Failure $failures)
    // {
    //     return $failures;
    //     // Handle the failures how you'd like.
    // }
    public function customValidationMessages()
    {
        return [
            'company.required' => ':attribute is required, please check file',
            'event.required' => ':attribute is required, please check file',
        ];
    }
    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }
    
   
}
