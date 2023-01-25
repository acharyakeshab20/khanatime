<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'Keshab Acharya',
            'email'=>'acharyakeshab20@gmail.com',
            'password'=>Hash::make('admin12345'),
            'address'=>'Tankisinwari',
            'phone'=>'9824342709',
            'status'=>'Active',
            'type'=>'Admin'
        ]);
    }
}
