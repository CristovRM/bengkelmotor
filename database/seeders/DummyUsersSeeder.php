<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
         [
            'name'=>'Lai Sitohang',
            'email'=>'sitohang@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('123456')
         ],

         [
            'name'=>'vikraselpian',
            'email'=>'vikra@gmail.com',
            'role'=>'kasir',
            'password'=>bcrypt('12345')
         ],

         [
            'name'=>'Cristov',
            'email'=>'cristov@gmail.com',
            'role'=>'kasir',
            'password'=>bcrypt('12345')
         ],

         [
            'name'=>'Sevia',
            'email'=>'sevia@gmail.com',
            'role'=>'kasir',
            'password'=>bcrypt('12345')
         ],

         [
            'name'=>'Yulia',
            'email'=>'yulia@gmail.com',
            'role'=>'kasir',
            'password'=>bcrypt('12345')
         ],

         [
            'name'=>'Wenny',
            'email'=>'wenny@gmail.com',
            'role'=>'kasir',
            'password'=>bcrypt('12345')
         ],


        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
