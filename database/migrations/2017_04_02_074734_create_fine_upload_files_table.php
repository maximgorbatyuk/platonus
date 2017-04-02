<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFineUploadFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path')->comment('Путь до загруженного файла uploads/*');
            $table->string('filename')->comment('Исходное название файла');
            $table->string('uuid')->unique()->comment('Уникальный идентификатор файла');
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
        Schema::dropIfExists('files');
    }
}
