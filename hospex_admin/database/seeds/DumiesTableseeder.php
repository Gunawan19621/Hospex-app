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
            ['name'  => 'Admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin')]
        ];
        DB::table('admins')->insert($admin);
    }
}
