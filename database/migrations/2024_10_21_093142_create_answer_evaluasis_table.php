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
        Schema::create('answer_evaluasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluasi_id')->constrained('evaluasis')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('answer1')->nullable(); // jawaban dari user
            $table->text('answer2')->nullable(); // jawaban dari user
            $table->text('answer3')->nullable(); // jawaban dari user
            $table->text('answer4')->nullable(); // jawaban dari user
            $table->text('answer5')->nullable(); // jawaban dari user
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_evaluasis');
    }
};
