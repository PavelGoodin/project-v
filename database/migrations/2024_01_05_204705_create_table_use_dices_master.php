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
        Schema::create('table_use_dices_master', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('position')->default(0);
            $table->integer('k')->default(0);
            $table->integer('visible')->default(0);
            $table->integer('exclusive')->default(0);
            $table->integer('pos_x')->default(0);
            $table->integer('pos_y')->default(0);
            $table->integer('stun')->default(0);//эффект 1-оглушен 2-горит
            $table->integer('temp')->default(0);//временный
            $table->integer('obj_id')->default(0);//global.player_kubs_id[position]
            
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
        Schema::dropIfExists('table_use_dices');
    }
};
