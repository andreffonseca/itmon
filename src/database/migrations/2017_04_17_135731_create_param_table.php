<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_call_def', function (Blueprint $table) {
            $table->increments('call_id');
            $table->string('name',10);
            $table->string('type',10);
            $table->string('dest_type',10)->nullable();
            $table->integer('is_active');
            $table->timestamps();
            
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_call_def');
    }
}
