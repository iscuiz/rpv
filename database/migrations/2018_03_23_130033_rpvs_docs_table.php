<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RpvsDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpv_doc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rpv_id')->unsigned();
            $table->foreign('rpv_id')
            ->references('id')
            ->on('rpvs');
            $table->integer('doc_id')->unsigned();
            $table->foreign('doc_id')
            ->references('id')
            ->on('docs');
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
        //
    }
}
