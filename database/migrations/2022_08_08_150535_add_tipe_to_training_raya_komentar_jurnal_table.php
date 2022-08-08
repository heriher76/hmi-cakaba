<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipeToTrainingRayaKomentarJurnalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_raya_komentar_jurnal', function (Blueprint $table) {
            $table->string('tipe')->after('user_pembuat_jurnal_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_raya_komentar_jurnal', function (Blueprint $table) {
            //
        });
    }
}
