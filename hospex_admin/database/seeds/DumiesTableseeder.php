<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DumiesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name'  => 'Exhibitor', 'email' => 'exhibitor@mail.com', 'password' => Hash::make('password'), 'usertable_id' => '1', 'usertable_type' => 'App\EventExhibitor'],
            ['name'  => 'Visitor', 'email' => 'visitor@mail.com', 'password' => Hash::make('password'), 'usertable_id' => '1', 'usertable_type' => 'App\Visitor']
        ];
        DB::table('users')->insert($users);

        $categories = [
            ['category_name' => 'Alkes'],
            ['category_name' => 'Farmasi'],
            ['category_name' => 'SIM-RS'],
            ['category_name' => 'Lab'],
        ];
        DB::table('categories')->insert($categories);

        $companies = [
            [
                'company_name'      => 'PT. Triadi Lintas Persada',
                'company_web'       => 'http://triadi.co.id',
                'company_email'     => 'mail@adi.co.id',
                // 'company_phone'     => '(021)4243859',
                'company_info'      => 'PT. Triadi Lintas Persada are a company engaged in medical equipment. We serves our customer since 2013 and has always been giving customer more and better product and service',
                'company_address'   => 'Jl. Percetakan Negara 10 No.42,RT.7/RW.4, Rawasari, Kec. Cemp. Putih, Kota Jakarta, Daerah Khusu Ibukota Jakarta 10570',
            ],
            [
                'company_name'      => 'PD. Mekar Djaya',
                'company_web'       => 'http://MD.co.id',
                'company_email'     => 'mail@md.co.id',
                // 'company_phone'     => '(021)4243859',
                'company_info'      => 'PT. Mekar Djaya are a company engaged in medical equipment. We serves our customer since 2013 and has always been giving customer more and better product and service',
                'company_address'   => 'Jl. Padjajaran 10 No.42,RT.7/RW.4, Rawasari, Kec. Cemp. Putih, Kota Cimahi, Provinsi Bandung 10570',
            ],
        ];
        DB::table('companies')->insert($companies);


        $company_categories = [
            [ 'category_id'      => '1', 'company_id'       =>  '1'],
            [ 'category_id'      => '2', 'company_id'       =>  '1'],
            [ 'category_id'      => '3', 'company_id'       =>  '1'],
            [ 'category_id'      => '2', 'company_id'       =>  '2'],
            [ 'category_id'      => '3', 'company_id'       =>  '2'],
            [ 'category_id'      => '4', 'company_id'       =>  '2'],
        ];
        DB::table('category_company')->insert($company_categories);

        $events = [
            [
                'event_title'       => 'Hospex Jakarta',
                'year'              => '2020',
                'city'              => 'Jakarta',
                'site_plan'         => 'qwerty',
                'event_location'    => 'JCC',
            ],
            [
                'event_title'       => 'Hospex Surabaya',
                'year'              => '2020',
                'city'              => 'Surabaya',
                'site_plan'         => 'qwerty',
                'event_location'    => 'Surabaya',
            ],
        ];
        DB::table('events')->insert($events);

        $schedules = [
            [
                'date'       => '2020-05-22',
                'event_id'   => '1',
            ],
            [
                'date'       => '2020-05-23',
                'event_id'   => '1',
            ],
            [
                'date'       => '2020-05-24',
                'event_id'   => '1',
            ],
            [
                'date'       => '2020-05-23',
                'event_id'   => '2',
            ],
            [
                'date'       => '2020-05-24',
                'event_id'   => '2',
            ],
            [
                'date'       => '2020-05-25',
                'event_id'   => '2',
            ],
        ];
        DB::table('event_schedules')->insert($schedules);

        $rundowns = [
            [
                'task'              => 'Sambutan',
                'duration'          => '20',
                'time'              => Carbon::createFromTimeString('10:00:00','Asia/Jakarta'),
                'event_schedule_id' => '1'
            ],
            [
                'task'              => 'Seminar SIM-RS',
                'duration'          => '177',
                'time'              => Carbon::createFromTimeString('10:40:00','Asia/Jakarta'),
                'event_schedule_id' => '1'
            ],
        ];
        DB::table('events_rundown')->insert($rundowns);

        $exhibitors = [
            [ 'event_id' => '1', 'company_id' => '1' ],
            [ 'event_id' => '1', 'company_id' => '2' ],
            [ 'event_id' => '2', 'company_id' => '1' ],
            [ 'event_id' => '2', 'company_id' => '2' ],
        ];
        DB::table('event_exhibitors')->insert($exhibitors);

        $performers = [
            [
                'name'              => 'Dr. Supeno',
                'email'             => 'supeno@mail.com',
                'info'              => 'Dr. Supeno is a founder ......',
                'phone'             => '(021)4243859',
                'events_rundown_id' => '1',
            ],
            [
                'name'              => 'Dr. Yanto',
                'email'             => 'yanto@mail.com',
                'info'              => 'Dr. Yanto is a founder ......',
                'phone'             => '(021)7097357',
                'events_rundown_id' => '1',
            ],
        ];
        DB::table('performers')->insert($performers);

        $visitors = [
            [ 'event_id' => '1', 'visitor_name' => 'lulu', 'visitor_email' => 'lulu@mail.com', 'company_id' => '1' ],
            [ 'event_id' => '1', 'visitor_name' => 'asep', 'visitor_email' => 'asep@mail.com', 'company_id' => '2' ],
            [ 'event_id' => '2', 'visitor_name' => 'lulu', 'visitor_email' => 'lulu@mail.com', 'company_id' => '1' ],
            [ 'event_id' => '2', 'visitor_name' => 'asep', 'visitor_email' => 'asep@mail.com', 'company_id' => '2' ],
        ];
        DB::table('event_visitors')->insert($visitors);

        $areas = [
            [
                'area_name'     => 'Hall A',
                'event_id'      => '1',
            ],
            [
                'area_name'     => 'Hall B',
                'event_id'      => '1',
            ],
            [
                'area_name'     => 'Hall C',
                'event_id'      => '1',
            ],
            [
                'area_name'     => 'Hall D',
                'event_id'      => '1',
            ],
            [
                'area_name'     => 'Hall A',
                'event_id'      => '2',
            ],
            [
                'area_name'     => 'Hall B',
                'event_id'      => '2',
            ],
            [
                'area_name'     => 'Hall C',
                'event_id'      => '2',
            ],
            [
                'area_name'     => 'Hall D',
                'event_id'      => '2',
            ],
        ];
        DB::table('areas')->insert($areas);

        $stands = [
            [
                'stand_name'            => 'A1',
                'area_id'               => '1',
                'event_exhibitor_id'    => '1',
            ],
            [
                'stand_name'            => 'A2',
                'area_id'               => '1',
                'event_exhibitor_id'    => '1',
            ],
            [
                'stand_name'            => 'A3',
                'area_id'               => '1',
                'event_exhibitor_id'    => '2',
            ],
            [
                'stand_name'            => 'A4',
                'area_id'               => '1',
                'event_exhibitor_id'    => '2',
            ],
            [
                'stand_name'            => 'A1',
                'area_id'               => '5',
                'event_exhibitor_id'    => '1',
            ],
            [
                'stand_name'            => 'A1',
                'area_id'               => '5',
                'event_exhibitor_id'    => '3',
            ],
            [
                'stand_name'            => 'A2',
                'area_id'               => '5',
                'event_exhibitor_id'    => '3',
            ],
            [
                'stand_name'            => 'A3',
                'area_id'               => '5',
                'event_exhibitor_id'    => '4',
            ],
            [
                'stand_name'            => 'A4',
                'area_id'               => '5',
                'event_exhibitor_id'    => '4',
            ],
           
        ];
        
    }
}
