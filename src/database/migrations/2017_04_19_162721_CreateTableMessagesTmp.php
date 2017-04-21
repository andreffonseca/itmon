<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMessagesTmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ods_api_call_temp', function (Blueprint $table) {
            $table->increments('message_id');
            $table->string('source_id',30);
            $table->string('poller',255)->nullable();
            $table->string('time',255)->nullable();
            $table->string('type',255)->nullable();
            $table->string('status',255)->nullable();
            $table->string('service',255)->nullable();
            $table->string('alert_id',255)->nullable();
            $table->string('host',100)->nullable();
            $table->string('ip',100)->nullable();
            $table->string('out_1',255)->nullable();
            $table->string('out_2',255)->nullable();
            $table->string('out_3',255)->nullable();
            $table->string('thruk_url',255)->nullable();
            $table->string('sca_url',255)->nullable();
            
            $table->string('uid',20)->nullable();
            $table->string('gid',20)->nullable();
            $table->string('flg_stat',10)->nullable();
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
        Schema::dropIfExists('ods_api_call_temp');
    }
}
