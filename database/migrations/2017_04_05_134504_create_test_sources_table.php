<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_sources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('questions')->comment('Вопросы');
            $table->string('corrects')->comment('Верные варианты ответа');
            $table->string('variant_arrays')->comment('Варианты ответа');
            $table->string('document_id')->nullable()->comment('Связанный документ');
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
        Schema::dropIfExists('test_sources');
    }
}
