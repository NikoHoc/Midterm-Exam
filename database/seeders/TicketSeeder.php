<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            [
                'flight_id' => 1,
                'passenger_name' => 'Krisna Wahyudi',
                'passenger_phone' => '081234567890',
                'seat_number' => 'A01',
                'is_boarding' => true,
                'boarding_time' => now()
            ],
            [
                'flight_id' => 1,
                'passenger_name' => 'Satria Adi',
                'passenger_phone' => '081234567890',
                'seat_number' => 'B02',
                'is_boarding' => true,
                'boarding_time' => now()
            ],
            [
                'flight_id' => 1,
                'passenger_name' => 'Mikiavonty',
                'passenger_phone' => '081234567890',
                'seat_number' => 'C01',
                'is_boarding' => false,
                'boarding_time' => null
            ],
            [
                'flight_id' => 1,
                'passenger_name' => 'Brimstone',
                'passenger_phone' => '081234567890',
                'seat_number' => 'D01',
                'is_boarding' => false,
                'boarding_time' => null
            ],
            [
                'flight_id' => 1,
                'passenger_name' => 'Fatih',
                'passenger_phone' => '081234567890',
                'seat_number' => 'E01',
                'is_boarding' => true,
                'boarding_time' => now()
            ],
        ]);
    }
}
