<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrainingRayaUpdateToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('training_raya_kategori_id')->nullable();
            $table->string('asal_cabang')->nullable();
            $table->string('sertifikat_lk1')->nullable();
            $table->string('file_jurnal')->nullable();
            $table->string('ss_hasil_plagiarism')->nullable();
            $table->string('surat_rekomendasi_training_raya')->nullable();
            $table->integer('training_raya_status_lulus_daftar')->nullable();
            $table->integer('training_raya_status_lulus_forum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
