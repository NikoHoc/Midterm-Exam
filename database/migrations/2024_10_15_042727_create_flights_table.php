<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*
        Tabel flights : field yang harus ada meliputi:
            1. id : auto increment (primary key)
            2. flight_code : required, unique, string(5) → contoh: JT610
            3. origin : required, string (3) -> contoh : SUB
            4. destination : required, string (3) → contoh : CGK
            5. departure_time : required, datetime
            6. arrival_time : required, datetime
            7. created_at
            8. updated_at
        */
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_code', 5)->unique();
            $table->string('origin', 3);
            $table->string('destination', 3);
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
