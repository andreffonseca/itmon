<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParamDbDest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_call_db_dest', function (Blueprint $table) {
            $table->increments('db_dest_id');
            $table->integer('call_id');
            $table->integer('call_param_id');
            $table->string('dest_tb_field');
            $table->timestamps();
            
            $table->unique(['call_id','call_param_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_call_db_dest');
    }
}
