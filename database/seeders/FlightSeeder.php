<?php

namespace Database\Seeders;

use Cron\HoursField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights')->insert([
            [
                'id' => 1,
                'flight_code' => 'SA601',
                'origin' => 'SUB',
                'destination' => 'SIN',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:30:00'
            ],
            [
                'id' => 2,
                'flight_code' => 'JT510',
                'origin' => 'SUB',
                'destination' => 'CGK',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:30:00'
            ],
            [
                'id' => 3,
                'flight_code' => 'GA212',
                'origin' => 'SUB',
                'destination' => 'KLN',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:30:00'
            ],
            [
                'id' => 4,
                'flight_code' => 'SA553',
                'origin' => 'SUB',
                'destination' => 'SIN',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:30:00'
            ],
            [
                'id' => 5,
                'flight_code' => 'GA601',
                'origin' => 'SUB',
                'destination' => 'MLN',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:30:00'
            ],
            [
                'id' => 6,
                'flight_code' => 'PL231',
                'origin' => 'SUB',
                'destination' => 'MLN',
                'departure_time' => '2024-10-15 13:00:00',
                'arrival_time' => '2024-10-15 16:30:00'
            ],
        
        ]);
    }
}
