<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMenuDisableToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->tinyInteger('menu_about_us')->default(1)->after('advertisement_section');
            $table->tinyInteger('menu_search')->default(1)->after('menu_about_us');
            $table->tinyInteger('menu_become_a_member')->default(1)->after('menu_search');
            $table->tinyInteger('menu_blog')->default(1)->after('menu_become_a_member');
            $table->tinyInteger('menu_job')->default(1)->after('menu_blog');
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
            $table->dropColumn('menu_about_us');
            $table->dropColumn('menu_search');
            $table->dropColumn('menu_become_a_member');
            $table->dropColumn('menu_blog');
            $table->dropColumn('menu_job');
        });
    }
}
