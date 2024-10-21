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
        Schema::create('question_evaluasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluasi_id')->constrained('evaluasis')->onDelete('cascade');
            $table->text('question'); // isi pertanyaan
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_evaluasis');
    }
};
