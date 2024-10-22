<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->default('-----');
            $table->text('description');
            $table->string('foto')->default(null);
            $table->integer('category')->default(0);
            $table->integer('size')->default(1);
            $table->string('bgcolor',20)->default('white');
            $table->double('trade_price',10,2)->nullable()->default(0.00);
            $table->double('retail_price',10,2)->nullable()->default(0.00);
            $table->double('discount',8,2)->nullable()->default(0.00);
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('hide')->default(0);
            
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
};
