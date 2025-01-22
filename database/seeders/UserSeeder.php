<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\RoleEnum;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::factory()->create([
            'first_name' => 'Administrator',
            'last_name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => '@secret',
        ])->syncRoles([RoleEnum::ADMIN]);
        User::factory()->create([
            'first_name' => 'Shundee',
            'last_name' => 'Navarroza',
            'email' => 'shundeenavarroza@gmail.com',
            'password' => '@secret',
        ])->syncRoles([RoleEnum::USER]);
    }
}
