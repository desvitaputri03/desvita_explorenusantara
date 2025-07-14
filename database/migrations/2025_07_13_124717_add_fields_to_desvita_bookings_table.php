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
        Schema::table('desvita_bookings', function (Blueprint $table) {
            $table->integer('number_of_people')->default(1)->after('booking_date');
            $table->text('special_requests')->nullable()->after('number_of_people');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('desvita_bookings', function (Blueprint $table) {
            $table->dropColumn(['number_of_people', 'special_requests']);
        });
    }
};
