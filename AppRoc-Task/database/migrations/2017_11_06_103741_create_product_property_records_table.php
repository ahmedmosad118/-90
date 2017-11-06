<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPropertyRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_property_records', function (Blueprint $table) {
              $table->increments('id');
              $table->string('value');
              $table->integer('property_id')->unsigned();
              $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
              $table->integer('product_id')->unsigned();
              $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_property_records');
    }
}
