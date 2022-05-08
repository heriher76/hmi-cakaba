<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->text('ttl')->nullable();
          $table->longText('alamat_sekarang')->nullable();
          $table->longText('alamat_asal')->nullable();
          $table->string('jk')->nullable();
          $table->string('phone')->nullable();
          $table->string('hobby')->nullable();
          $table->string('jurusan')->nullable();
          $table->text('fakultas')->nullable();
          $table->string('angkatan')->nullable();
          $table->string('angkatan_lk')->nullable();
          $table->string('komisariat_lk')->nullable();
          $table->longText('riwayat_pendidikan')->nullable();
          $table->longText('riwayat_organisasi')->nullable();
          $table->string('photo')->nullable();
          $table->longText('alasan_daftar_lk')->nullable();
          $table->longText('pekerjaan')->nullable();
          $table->boolean('sudah_lk1')->nullable();
          $table->boolean('sudah_lk2')->nullable();
          $table->boolean('sudah_lk3')->nullable();
          $table->boolean('tidak_lk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
