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
            'clock_in'=>'2023-12-11 10:32:39',
            'clock_out'=>'2023-12-11 19:32:39',
        ];
        DB::table('works')->insert($param);
        $param=[
            'user_id'=>'2',
            'clock_in'=>'2023-12-15 10:00:00',
            'clock_out'=>'2023-12-15 20:00:00',
        ];
        DB::table('works')->insert($param);
    }
}
