<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingRayaQuestionTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_raya_question_test', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('pertanyaan')->nullable();
            $table->string('tipe')->nullable();
            $table->integer('training_raya_kategori_id')->nullable();
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
        Schema::dropIfExists('training_raya_question_test');
    }
}
