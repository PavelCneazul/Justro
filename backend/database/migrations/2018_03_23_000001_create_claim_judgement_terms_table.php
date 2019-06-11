<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimJudgementTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_judgement_terms', function (Blueprint $t) {
            $t->increments('id');
            $t->date('term_date');



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
        Schema::drop('claim_judgement_terms');
    }
}
