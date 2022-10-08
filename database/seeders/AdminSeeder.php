<?php

namespace Database\Seeders;

use App\Models\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;

        $admin->name = 'admin';
        $admin->username = 'admin';
        $admin->password = Hash::make('admin');

        $admin->save();
    }
}
