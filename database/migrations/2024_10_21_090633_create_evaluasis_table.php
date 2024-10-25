<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modul_id')->constrained('moduls')->onDelete('cascade');
            $table->string('title');
            $table->string('question1');
            $table->string('type1');
            $table->string('question2')->nullable();
            $table->string('type2')->nullable();
            $table->string('question3')->nullable();
            $table->string('type3')->nullable();
            $table->string('question4')->nullable();
            $table->string('type4')->nullable();
            $table->string('question5')->nullable();
            $table->string('type5')->nullable();
            $table->datetime('deadline')->nullable();
            $table->datetime('time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasis');
    }
};
