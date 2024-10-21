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
        Schema::create('sub_moduls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modul_id');
            $table->string('type');
            $table->string('judul');
            $table->text('description');
            $table->datetime('deadline')->nullable();
            $table->string('link_video')->nullable();
            $table->json('files')->nullable(); // menggunakan JSON untuk menyimpan file
            $table->datetime('time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
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
