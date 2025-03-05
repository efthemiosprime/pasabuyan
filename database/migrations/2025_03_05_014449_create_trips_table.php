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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('origin_city');
            $table->string('origin_country');
            $table->string('destination_city');
            $table->string('destination_country');
            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');
            $table->enum('transportation_mode', ['car', 'bus', 'train', 'plane', 'boat', 'other']);
            $table->decimal('max_weight_kg', 6, 2)->nullable();
            $table->decimal('max_volume_l', 6, 2)->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['planned', 'in_progress', 'completed', 'canceled'])->default('planned');
            $table->point('origin_coordinates')->nullable();
            $table->point('destination_coordinates')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
