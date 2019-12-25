<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Restaurants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('branch');
            $table->string('phone');
            $table->string('email');
            $table->string('logo');
            $table->string('address');
            $table->string('housenumber');
            $table->string('postcode');
            $table->string('city');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('url');
            $table->integer('open');
            $table->integer('bestMatch');
            $table->integer('newestScore');
            $table->integer('ratingAverage');
            $table->integer('popularity');
            $table->string('averageProductPrice');
            $table->string('deliveryCosts');
            $table->string('minimumOrderAmount');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
