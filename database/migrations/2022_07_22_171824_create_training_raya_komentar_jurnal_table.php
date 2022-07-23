<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingRayaKomentarJurnalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_raya_komentar_jurnal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_komentar_id')->nullable();
            $table->integer('user_pembuat_jurnal_id')->nullable();
            $table->longText('komentar')->nullable();
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
        Schema::dropIfExists('training_raya_komentar_jurnal');
    }
}
