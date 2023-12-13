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
            'rest_start'=>'2023/11/11 12:32:39',
            'rest_stop'=>'2023/11/11 13:00:39',
        ];
        DB::table('rests')->insert($param);
    }
}
