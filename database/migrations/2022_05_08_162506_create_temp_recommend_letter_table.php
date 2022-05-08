<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempRecommendLetterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_recommend_letter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('sekretariat')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('periode')->nullable();
            $table->string('kabko')->nullable();
            $table->string('ketum')->nullable();
            $table->string('sekum')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('temp_recommend_letter');
    }
}
