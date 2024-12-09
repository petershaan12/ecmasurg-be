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
        Schema::table('users_quizzes', function (Blueprint $table) {
             // Menambahkan kolom untuk soal 1 hingga soal 5
             $table->foreignId('question_id_1')->constrained('quizzes')->onDelete('cascade');
             $table->foreignId('question_id_2')->constrained('quizzes')->onDelete('cascade');
             $table->foreignId('question_id_3')->constrained('quizzes')->onDelete('cascade');
             $table->foreignId('question_id_4')->constrained('quizzes')->onDelete('cascade');
             $table->foreignId('question_id_5')->constrained('quizzes')->onDelete('cascade');
 
             // Menambahkan kolom untuk jawaban 1 hingga 5
             $table->string('answer_1');
             $table->string('answer_2');
             $table->string('answer_3');
             $table->string('answer_4');
             $table->string('answer_5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_quizzes', function (Blueprint $table) {
            $table->dropForeign(['question_id_1']);
            $table->dropForeign(['question_id_2']);
            $table->dropForeign(['question_id_3']);
            $table->dropForeign(['question_id_4']);
            $table->dropForeign(['question_id_5']);
            
            $table->dropColumn('question_id_1');
            $table->dropColumn('question_id_2');
            $table->dropColumn('question_id_3');
            $table->dropColumn('question_id_4');
            $table->dropColumn('question_id_5');
            
            $table->dropColumn('answer_1');
            $table->dropColumn('answer_2');
            $table->dropColumn('answer_3');
            $table->dropColumn('answer_4');
            $table->dropColumn('answer_5');
        });
    }
};
