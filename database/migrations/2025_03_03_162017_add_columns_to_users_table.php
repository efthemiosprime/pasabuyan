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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->after('password');
            $table->text('about')->nullable()->after('phone_number');
            $table->string('profile_picture')->nullable()->after('about');
            $table->boolean('id_verified')->default(false)->after('profile_picture');
            $table->decimal('rating', 3, 2)->nullable()->after('id_verified');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('about');
            $table->dropColumn('profile_picture');
            $table->dropColumn('id_verified');
            $table->dropColumn('rating');
        });
    }
};
