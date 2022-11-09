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
            $table->string('home_poll_image')->nullable();
            $table->string('home_shop_image')->nullable();
            $table->string('home_shop_category')->nullable();
            $table->string('home_shop_discount')->nullable();
            $table->string('home_shop_details')->nullable();
            $table->string('home_shop_link')->nullable();
            $table->string('home_add_img1')->nullable();
            $table->string('home_add_img1_link')->nullable();
            $table->string('home_add_img2')->nullable();
            $table->string('home_add_img2_link')->nullable();
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
