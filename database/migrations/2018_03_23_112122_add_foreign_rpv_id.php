<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignRpvId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rpvs', function (Blueprint $table) {
            $table->integer('rpv_id')->unsigned();
            $table->foreign('rpv_id')
            ->references('id')
            ->on('rpvs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rpvs', function (Blueprint $table) {
            //
        });
    }
}
