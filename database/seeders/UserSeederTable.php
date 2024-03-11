<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
            'name' => "Ovi Novian",
            'email' => 'ovi.novian.aja@gmail.com',
            'password' => Hash::make('password'),
            'kelamin' => 'Laki-laki',
            'status' => '1'
        ]);
        
        $user->assignRole(1);
    }
}
