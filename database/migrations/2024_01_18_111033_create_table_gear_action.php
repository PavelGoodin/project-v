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
        Schema::create('table_gear_action', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(1);
            $table->integer('gear_id')->default(0);
            $table->integer('dice_position')->default(1);
            $table->integer('num_action')->default(1);
            $table->integer('n_xod')->default(1);
            $table->integer('dmg_enemy')->default(0);
            $table->integer('dmg_player')->default(0);
            $table->integer('bonus_dmg')->default(0);
            $table->integer('heel')->default(0);
            $table->integer('shield')->default(0);
            $table->integer('korr')->default(0);
            $table->integer('atk_temp')->default(0);
            $table->integer('fire_dices')->default(0);
            $table->integer('stun_dices')->default(0);
            $table->integer('start_games_id')->default(1);
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
        Schema::dropIfExists('table_gear_action');
    }
};
