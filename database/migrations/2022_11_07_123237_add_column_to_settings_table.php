<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->tinyInteger('newest_face')->default(1)->after('home_add_img2_link');
            $table->tinyInteger('featured_models')->default(1)->after('newest_face');
            $table->tinyInteger('child_model_and_acting')->default(1)->after('featured_models');
            $table->tinyInteger('top_photographer')->default(1)->after('child_model_and_acting');
            $table->tinyInteger('convention_and_trade_show_model')->default(1)->after('top_photographer');
            $table->tinyInteger('shop_section')->default(1)->after('convention_and_trade_show_model');
            $table->tinyInteger('advertisement_section')->default(1)->after('shop_section');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('newest_face');
            $table->dropColumn('featured_models');
            $table->dropColumn('child_model_and_acting');
            $table->dropColumn('top_photographer');
            $table->dropColumn('convention_and_trade_show_model');
            $table->dropColumn('shop_section');
            $table->dropColumn('advertisement_section');
        });
    }
}
