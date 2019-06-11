<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_parts', function (Blueprint $t) {
            $t->increments('id');
            $t->string('part_name');
            $t->string('part_role');



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
        Schema::drop('claim_parts');
    }
}
