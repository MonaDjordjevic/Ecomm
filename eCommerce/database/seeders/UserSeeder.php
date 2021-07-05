<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;//ovo cu koristiti da enkriptujem sifru
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'name'=>'aaa bbb',
            'email'=>'aaabbb@gmail.com',
            'password'=>Hash::make('aaabbb') 
        ],
        [
            'name'=>'bbb aaa',
            'email'=>'bbbaaa@gmail.com',
            'password'=>Hash::make('bbbaaa') 
        ],
        [
            'name'=>'ccc ddd',
            'email'=>'cccddd@gmail.com',
            'password'=>Hash::make('cccddd') 
        ],
        ]);
    }
}
