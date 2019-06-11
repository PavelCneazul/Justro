<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
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
            $table->string('name', 255);
            $table->string('path', 255);
            $table->string('extension');
            $table->integer('parent_id')->nullable()->unsigned();
            $table->text('tags')->nullable();


            $table->boolean('signed')->default(0);
            $table->string('checksum');
            $table->string('reference')->nullable();
            $table->integer('barcode')->nullable();
            $table->integer('user_id')->unsigned()->nullable();

            $table->integer('external_file_id')->unsigned()->nullable();


            $table->timestamps();
            $table->softDeletes();

//            $table->foreign('parent_id')->references('id')->on('files')->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files');
    }
}
