<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParamDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_call_params', function (Blueprint $table) {
            $table->increments('call_param_id');
            $table->integer('call_id');
            $table->string('name',5);
            $table->string('description',50);
            $table->string('data_type',10)->default('string');
            $table->integer('is_required')->default(1); // 1 Yes - 0 No
            $table->integer('max_len')->default(0);
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
        Schema::dropIfExists('api_call_params');
    }
}
