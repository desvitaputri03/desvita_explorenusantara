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
            $table->foreignId('destination_id')->constrained('desvita_destinations')->onDelete('cascade');
            $table->foreignId('tourist_id')->constrained('desvita_tourists')->onDelete('cascade');
            $table->date('booking_date');
            $table->integer('number_of_people');
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->string('payment_proof')->nullable();
            $table->date('payment_due_date')->nullable(); // Tambahkan kolom batas waktu pembayaran
            $table->timestamps();
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
