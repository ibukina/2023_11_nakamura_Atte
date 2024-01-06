<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'username'=>'山田 太郎',
            'email'=>'test@example.com',
            'password'=>Hash::make('2DDywxxwE3VM@B2'),
        ];
        DB::table('users')->insert($param);
        $param=[
            'username'=>'山田 二郎',
            'email'=>'what@example.com',
            'password'=>Hash::make('927AP2QJqqYQA@'),
        ];
        DB::table('users')->insert($param);
        $param=[
            'username'=>'山田 三郎',
            'email'=>'what3@example.com',
            'password'=>Hash::make('327AP2QJqqYQA@'),
        ];
        DB::table('users')->insert($param);
        $param=[
            'username'=>'山田 四郎',
            'email'=>'what4@example.com',
            'password'=>Hash::make('827AP2QJqqYQA@'),
        ];
        DB::table('users')->insert($param);
        $param=[
            'username'=>'山田 五郎',
            'email'=>'what5@example.com',
            'password'=>Hash::make('627AP2QJqqYQA@'),
        ];
        DB::table('users')->insert($param);
        $param=[
            'username'=>'山田 六郎',
            'email'=>'what6@example.com',
            'password'=>Hash::make('127AP2QJqqYQA@'),
        ];
        DB::table('users')->insert($param);
    }
}
