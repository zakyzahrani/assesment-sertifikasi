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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('alamat_ktp');
            $table->string('alamat_lengkap');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kewarganegaraan');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('propinsi_lahir');
            $table->string('kabupaten_lahir');
            $table->string('jenis_kelamin');
            $table->string('status_menikah');
            $table->string('agama');
            $table->string('no_telp');
            $table->string('no_hp');
            $table->string('email_daftar');
            $table->string('status_daftar')->default('Perlu Konfirmasi Admin');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
