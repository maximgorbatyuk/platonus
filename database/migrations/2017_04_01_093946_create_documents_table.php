<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->comment('Название файла');
            $table->string('authorId')->nullable()->comment('Айди сессии автора');
            $table->string('filename')->comment('Краткое имя файла');
            $table->string('path')->comment('Полный путь до файла');
            $table->text('description')->nullable()->comment('Описание файла');
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
        Schema::dropIfExists('documents');
    }
}
