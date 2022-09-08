<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcceptedJobNadRateColumnToUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('accepted_job')->nullable()->after('cover_img');
            $table->integer('rate_per_hours')->nullable()->after('accepted_job');
            $table->integer('rate_half_day')->nullable()->after('rate_per_hours');
            $table->integer('rate_full_day')->nullable()->after('rate_half_day');
            $table->string('language')->nullable()->after('rate_full_day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn('accepted_job');
            $table->dropColumn('rate_per_hours');
            $table->dropColumn('rate_half_day');
            $table->dropColumn('rate_full_day');
            $table->dropColumn('language');
        });
    }
}
