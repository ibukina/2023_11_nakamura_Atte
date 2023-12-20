<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RestsTableSeeder extends Seeder
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
            'work_id'=>'1',
            'rest_start'=>'2023-12-11 12:32:39',
            'rest_stop'=>'2023-12-11 13:00:39',
        ];
        DB::table('rests')->insert($param);
        $param=[
            'user_id'=>'2',
            'work_id'=>'2',
            'rest_start'=>'2023-12-15 12:30:00',
            'rest_stop'=>'2023-12-15 13:00:00',
        ];
        DB::table('rests')->insert($param);
    }
}
