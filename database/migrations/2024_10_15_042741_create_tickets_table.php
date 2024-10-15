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
        Tabel tickets : field yang harus ada meliputi :
            1. id : auto increment (primary key)
            2. flight_id : required (foreign key id dari table flights)
            3. passanger_name : required, string
            4. passenger_phone : required, string (14)
            5. seat_number : required, string(3) → contoh: A01
            6. is_boarding : required, default FALSE (0)
            7. boarding_time : datetime, nullable
            8. created_at
            9. updated_at
        */
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flight_id');
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->string('passenger_name');
            $table->string('passenger_phone', 14);
            $table->string('seat_number', 3);
            $table->boolean('is_boarding')->default(0);
            $table->dateTime('boarding_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
