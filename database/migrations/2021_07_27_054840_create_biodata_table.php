<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->string('nia');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('goldar')->nullable();
            $table->string('fakultas');
            $table->string('jurusan')->nullable();
            $table->string('nim')->nullable();
            $table->text('alamat');
            $table->string('sd')->nullable();
            $table->string('smp')->nullable();
            $table->string('sma')->nullable();
            $table->string('hobi')->nullable();
            $table->text('prestasi')->nullable();
            $table->text('status_pengurus')->nullable();
            $table->string('pelatihan_pmi')->nullable();
            $table->string('pelatihan_luar')->nullable();
            $table->string('spesialisasi_pmi')->nullable();
            $table->string('spesialisasi_luar')->nullable();
            $table->text('pengalaman_kerja')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('bakat')->nullable();
            $table->string('cita_cita')->nullable();
            $table->text('motto')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('id_line')->nullable();
            $table->text('kesan')->nullable();
            $table->text('pesan')->nullable();
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata');
    }
}
