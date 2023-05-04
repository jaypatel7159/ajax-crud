<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\Employee::create([
        //     'f_name' => 'admin',
        //     // 'email' => 'admin@gmail.com',
        //     // 'password' => Hash::make('12345'),
        //  ]);

        \App\Models\Employee::factory(50)->create();
    }
}
