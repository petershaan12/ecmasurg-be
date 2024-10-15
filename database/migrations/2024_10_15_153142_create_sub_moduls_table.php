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
        Schema::create('sub_moduls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modul_id');
            $table->string('type');
            $table->string('judul');
            $table->text('description');
            $table->string('link_video')->nullable();
            $table->string('ppt')->nullable();
            $table->string('pdf')->nullable();
            $table->string('word')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('modul_id')->references('id')->on('moduls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_moduls');
    }
};
