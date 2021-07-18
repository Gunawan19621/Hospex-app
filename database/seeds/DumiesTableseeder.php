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
        $admin = [
            ['name'  => 'lulu muhamad', 'email' => 'lulumuhamad01@gmail.com', 'password' => Hash::make('admin1234')]
        ];
        DB::table('admins')->insert($admin);

        $admin2 = [
            ['name'  => 'Admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin')]
        ];
        DB::table('admins')->insert($admin2);
    }
}
