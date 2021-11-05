<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTileConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tile_configurations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('tile_id');
            $table->foreignId('board_tiles_id');
            $table->foreignId('user_id');
            $table->integer('height');
            $table->integer('width');
            $table->string('text_color');
            $table->string('background_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tile_configurations');
    }
}
