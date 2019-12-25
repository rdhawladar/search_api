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
            $table->string('name')->nullable();
            $table->string('branch')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('housenumber')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('url')->nullable();
            $table->integer('open')->nullable();
            $table->integer('bestMatch')->nullable();
            $table->integer('newestScore')->nullable();
            $table->integer('ratingAverage')->nullable();
            $table->integer('popularity')->nullable();
            $table->string('averageProductPrice')->nullable();
            $table->string('deliveryCosts')->nullable();
            $table->string('minimumOrderAmount')->nullable();
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
