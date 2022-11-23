<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeaderToColumnToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('top_header_address')->after('menu_job')->nullable();
            $table->string('top_header_phone_no')->after('top_header_address')->nullable();
            $table->longText('plan_faq')->after('top_header_phone_no')->nullable();
            $table->longText('plan_hw_do_upgrade')->after('plan_faq')->nullable();
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
            $table->dropColumn('top_header_address');
            $table->dropColumn('top_header_phone_no');
            $table->dropColumn('plan_faq');
            $table->dropColumn('plan_hw_do_upgrade');
        });
    }
}
