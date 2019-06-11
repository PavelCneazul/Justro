<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimApiSearchLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_api_search_logs', function (Blueprint $t) {
            $t->increments('id');

            $t->longText('data');
            $t->dateTime('last_modified');
            $t->dateTime('next_term')->nullable();
            $t->text('link')->nullable();



            $t->integer('claim_id')->unsigned();
            $t->foreign('claim_id')->references('id')->on('claims')->onDelete('cascade');


            $t->timestamps();
            $t->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('claim_api_search_logs');
    }
}
