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
        Schema::create('task_collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_modul_id');
            $table->unsignedBigInteger('user_id');
            $table->json('files')->nullable();
            $table->boolean('submited')->nullable();
            $table->integer('grade')->nullable();
            $table->string('feedback')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sub_modul_id')->references('id')->on('sub_moduls')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_collections');
    }
};
