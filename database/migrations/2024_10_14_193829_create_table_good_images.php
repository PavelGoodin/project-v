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
        Schema::create('good_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('promt')->nullable()->default('-----');
            $table->string('imageID');
            $table->string('foto')->default('simple.png');
            $table->integer('category')->default(0);
            $table->integer('seed')->default(555);
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
        Schema::dropIfExists('good_images');
    }
};
