<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
           // $table->id();
           // $table->timestamps();

            $table->bigIncrements('product_id');
            $table->string('item_id');
            $table->string('name');
            $table->decimal('price')->default(0.0);
            $table->string('description', 1000)->nullable();
            $table->string('image')->nullable();
            $table->string('gender');            
            $table->string('size');            
            $table->string('color');                        
            $table->dateTime('created_date');
            $table->dateTime('modify_date')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
