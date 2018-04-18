<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymenttablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymenttables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('businessname',255);
            $table->string('primaryphone',255);
            $table->string('email',255);
            $table->string('category',255);
            $table->text('keyword');
            $table->string('agent',255);
            $table->text('callcenter');
            $table->string('businesshours',255);
            $table->string('lastname',255);
            $table->string('firstname',255);
            $table->string('middleinitial',255);
            $table->integer('creditcardnumber');
            $table->string('month',255);
            $table->string('year',255);
            $table->integer('cvv');
            $table->string('street',255);
            $table->string('city',255);
            $table->string('state',255);
            $table->integer('zipcode');
            $table->integer('subscriptiontype');
            $table->string('agreementstatus');
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
        Schema::dropIfExists('paymenttables');
    }
}
