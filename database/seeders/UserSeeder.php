<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacherRole = Role::where('name', 'teacher')->first();
        $studentRole = Role::where('name', 'student')->first();

        User::firstOrCreate([
            'name' => 'Anu Davaanyam',
            'email' => 'anudavaanyam1@gmail.com',
            'password' => Hash::make('Anuka1234'),
            'role_id' => $teacherRole->id,
        ]);

        User::firstOrCreate([
            'name' => 'John Bieber',
            'email' => 'john1234@gmail.com',
            'password' => Hash::make('John1234'),
            'role_id' => $teacherRole->id,
        ]);

        // Create students
        User::firstOrCreate([
            'name' => 'Tamir Ganzorig ',
            'email' => 'ttamirr@gmail.com',
            'password' => Hash::make('Tamir123456'),
            'role_id' => $studentRole->id,
        ]);
        User::firstOrCreate([
            'name' => 'Lee Jiwon',
            'email' => 'jiwon2@example.com',
            'password' => Hash::make('Jiwon1234'),
            'role_id' => $studentRole->id,
        ]);

        User::firstOrCreate([
            'name' => 'Nagy Gabor',
            'email' => 'gabor3@example.com',
            'password' => Hash::make('GaborNagy1234'),
            'role_id' => $studentRole->id,
        ]);
    }
}
