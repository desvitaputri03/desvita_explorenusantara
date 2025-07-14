<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesvitaGalleriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('desvita_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('caption')->nullable();
            $table->integer('order')->default(0);
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->timestamps();

            $table->foreign('destination_id')->references('id')->on('desvita_destinations')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desvita_galleries');
    }
}
 