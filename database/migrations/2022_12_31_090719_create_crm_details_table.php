<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_name')->nullable();
            $table->string('call_type');
            $table->string('phone_number');
            $table->string('name');
            $table->string('query_type');
            $table->string('gender');
            $table->string('call_remarks');
            $table->string('alt_phone_number');
            $table->string('address');
            $table->string('verbatim');
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
        Schema::dropIfExists('crm_details');
    }
}
