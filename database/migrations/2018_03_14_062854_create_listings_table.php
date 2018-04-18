<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name',255);
            $table->text('address',255);
            $table->string('email',255);
            $table->string('primaryphone',255);
            $table->string('status',255);
            $table->text('details');
            $table->text('categories');
            $table->text('additionalinfo');
            $table->string('altemail',255);
            $table->string('altphone',255);
            $table->text('link');
            $table->string('logo',255);
            $table->string('businesshours',255);
            $table->string('paymentmethod',255);
            $table->string('year_started',255);
            $table->string('customerusername',255);
            $table->string('addedby',255);
            $table->dateTime('updated');
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
        Schema::dropIfExists('listings');
    }
}
