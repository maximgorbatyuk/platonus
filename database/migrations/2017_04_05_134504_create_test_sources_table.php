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
            $table->text('questions')->comment('Вопросы');
            $table->text('corrects')->comment('Верные варианты ответа');

            $table->text('vars_first')->comment('Варианты 1 ответа');
            $table->text('vars_second')->comment('Варианты 2 ответа');
            $table->text('vars_third')->comment('Варианты 3 ответа');
            $table->text('vars_forth')->comment('Варианты 4 ответа');
            $table->text('vars_fifth')->comment('Варианты 5 ответа');


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
