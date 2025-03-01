<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('number_plates', function (Blueprint $table) {
            $table->id();
            $table->string('plate_type'); // front, back, pair
            $table->string('flag')->nullable(); // EV, GB, UK, No Flags
            $table->boolean('border')->default(false);
            $table->string('layout')->default('normal'); // normal, 3D, 4D
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('number_plates');
    }
};
