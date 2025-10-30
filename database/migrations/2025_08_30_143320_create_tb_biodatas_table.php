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
        Schema::create('tb_biodatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('angkatan_id')->constrained('tb_angkatans')->onDelete('cascade');
            $table->string('nama',30);
            $table->string('jenis_kelamin',10);
            $table->text('tempat');
            $table->date('tanggal_lahir');
            $table->string('tahun_lulus',4);
            $table->string('pekerjaan')->nullable();
            $table->string('no_telp');
            $table->string('gambar')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_biodatas');
    }
};
