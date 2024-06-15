<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Using ORM Eloquent
        $user = new User;
        $user->document = 75000001;
        $user->fullname = 'Jhon Wick';
        $user->gender = 'Male';
        $user->birthdate = '1988-05-08';
        $user->phone = '3257852148';
        $user->email = 'scubides58@soy.sena.edu.co';
        $user->password = bcrypt('admin');
        $user->role = 'Administrator';
        $user->save();

        $user = new User;
        $user->document = 75000002;
        $user->fullname = 'Sacrias Flores';
        $user->gender = 'Male';
        $user->birthdate = '1988-05-05';
        $user->phone = '3255466454';
        $user->email = 'n@n.com';
        $user->password = bcrypt('admin');
        $user->role = 'Administrator';
        $user->save();

        //Using DB Array
        DB::table('users')->insert([
            'document'   => 75000003,
            'fullname'   => 'Alanis Morrisete',
            'gender'     => 'Female',
            'birthdate'  => '1560-12-16',
            'phone'      => '3124548978',
            'email'      => 'no@no.com',
            'password'   => bcrypt('admin'),
            'role'       => 'Customer',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
