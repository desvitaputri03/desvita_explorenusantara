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
        Schema::create('desvita_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id');
            $table->unsignedBigInteger('tourist_id');
            $table->date('booking_date');
            $table->string('status');
            $table->timestamps();

            $table->foreign('destination_id')->references('id')->on('desvita_destinations')->onDelete('cascade');
            $table->foreign('tourist_id')->references('id')->on('desvita_tourists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desvita_bookings');
    }
};
