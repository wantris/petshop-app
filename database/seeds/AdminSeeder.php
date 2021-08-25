<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = "admin";
        $admin->username = "admin";
        $admin->email = "yudis@gmail.com";
        $admin->password = Hash::make("admin");
        $admin->save();
    }
}
