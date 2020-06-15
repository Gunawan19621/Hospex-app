<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('user_views', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::statement("CREATE OR REPLACE VIEW user_views AS select 'visitor_name' AS `name`,`visitor_email` AS `email`, `password` AS `password`,`api_token` AS `api_token`,'visitor' AS `type`, `id` AS `id` from `event_visitors` 
        union 
        select `b`.`company_name` AS `name`,`b`.`company_email` AS `email`,`a`.`password` AS `password`,`a`.`api_token` AS `api_token`,'exhibitor' AS `type`,`a`.`id` AS `id` from (`event_exhibitors` `a` left join `companies` `b` on(`a`.`company_id` = `b`.`id`))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('user_views');
        DB::statement("DROP VIEW user_views");
    }
}
