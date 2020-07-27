<?php
namespace App\Exports\Sheets;

use App\EventExhibitor;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Ramsey\Collection\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ExportFormatSheet implements FromCollection, WithTitle, WithHeadings
{
    private $title;
    private $table;
    private $query;
    private $headre;

    public function __construct($title, $table, $query=null, $header)
    {
        $this->title    = $title;
        $this->table    = $table;
        $this->query    = $query;
        $this->header   = $header;
    }

    public function collection()
    {
        if ($this->title == 'Companies') {
            return collect($this->table::select($this->query)->get());
        }else{
            $t = Carbon::now();
            $event =  DB::table('events')
                    ->select('events.id')
                    ->leftJoin('event_schedules', 'events.id', '=', 'event_schedules.event_id')
                    ->whereDate('events.date',' >= ',$t)
                    ->orderBy('events.date')
                    ->first();
            $data= array();
            for ($i=1; $i <= 10; $i++) { 
                $data[] = [$i, $event->id, ''];
            }
            return collect($data);
        }
    }
    /**
     * @return Builder
     */
    // public function query()
    // {
    //     if ($this->query == null) {
    //         return $this->table::query();
    //     }else{
    //         return $this->table::select($this->query);
    //     }
    // }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }
    public function headingRow(): int
    {
        return 2;
    }
    public function headings(): array
    {
        return $this->header;
    }
}