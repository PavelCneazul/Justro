<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimHearingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_hearings', function (Blueprint $t) {
            $t->increments('id');
            $t->string('case')->nullable();
            $t->date('date')->nullable();
            $t->string('hour')->nullable();
            $t->string('solution')->nullable();
            $t->text('solution_summary')->nullable();
            $t->date('sentencing_date')->nullable();
            $t->string('hearing_document')->nullable();
            $t->string('document_number')->nullable();
            $t->date('document_date')->nullable();



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
        Schema::drop('claim_hearings');
    }
}
