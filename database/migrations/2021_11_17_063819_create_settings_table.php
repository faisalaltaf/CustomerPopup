<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('file_path')->nullable();
            $table->string('top_heading')->nullable();
            $table->string('list_item')->nullable();
            $table->string('store_name')->nullable();
            $table->string('email')->nullable();
            $table->string('button')->nullable();
            $table->string('head_background')->nullable();
            $table->string('top_heading_color')->nullable();
            $table->string('top_heading_font')->nullable();
            $table->string('list_items_color')->nullable();
            $table->string('list_items_font')->nullable();
            $table->string('button_colors')->nullable();
            $table->string('tags_shop')->nullable();
            $table->string('weekday')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
