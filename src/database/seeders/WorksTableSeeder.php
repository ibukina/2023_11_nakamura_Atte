<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'user_id'=>'1',
            'clock_in'=>'2023/11/11 10:32:39',
            'clock_out'=>'2023/11/11 19:32:39',
        ];
        DB::table('works')->insert($param);
    }
}
