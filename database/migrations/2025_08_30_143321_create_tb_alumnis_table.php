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
        Schema::create('tb_alumnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('angkatan_id')->constrained('tb_angkatans')->onDelete('cascade');
            $table->foreignId('biodata_id')->constrained('tb_biodatas')->onDelete('cascade');
            $table->string('npm',20);
            $table->string('tahun_lulus',4);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_alumnis');
    }
};
