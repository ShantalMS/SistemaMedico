<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Default Admin
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);
        }

        // 2. Create Default Doctor
        $doctorUser = User::where('email', 'doctor@example.com')->first();
        if (!$doctorUser) {
            $doctorUser = User::create([
                'name' => 'Dr. House',
                'email' => 'doctor@example.com',
                'password' => Hash::make('password'),
                'role' => 'doctor',
                'email_verified_at' => now(),
            ]);
        }

        // Create Doctor Profile
        $doctor = Doctor::where('user_id', $doctorUser->id)->first();
        if (!$doctor) {
            $doctor = Doctor::create([
                'user_id' => $doctorUser->id,
                'specialty' => 'Diagnostic Medicine',
                'consultation_price' => 150.00,
            ]);
        }

        // 3. Create Default Patient
        if (!User::where('email', 'patient@example.com')->exists()) {
            User::create([
                'name' => 'Jane Patient',
                'email' => 'patient@example.com',
                'password' => Hash::make('password'),
                'role' => 'patient',
                'email_verified_at' => now(),
            ]);
        }

        // 4. Create Schedules for the Doctor (Monday to Friday, 9am - 5pm)
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        foreach ($days as $day) {
            if (!Schedule::where('doctor_id', $doctor->id)->where('day_of_week', $day)->exists()) {
                Schedule::create([
                    'doctor_id' => $doctor->id,
                    'day_of_week' => $day,
                    'start_time' => '09:00:00',
                    'end_time' => '17:00:00',
                ]);
            }
        }
    }
}
