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
         Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // The schedule date
            $table->time('time'); // The schedule time
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for user
            $table->timestamps();
            $table->enum('updates', ['ongoing', 'done'])->default('ongoing'); // default is 'user'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
