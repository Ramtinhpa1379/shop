<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UesrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser=User::query()->create([
            'role_id'=>Role::query()->where('title','admin')->first()->id,
            'name'=>'admin',
            'email'=>'eng.dark79@gmail.com',
            'password'=>bcrypt('12345')
        ]);
    }
}
