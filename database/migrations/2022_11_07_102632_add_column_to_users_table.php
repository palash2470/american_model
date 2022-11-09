<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('feature_model')->default(0)->after('views_count')->comment("1=>Feature Model,0=>Not feature model");
            $table->integer('convention_and_trade')->default(0)->after('feature_model')->comment("1=>On,0=>Off");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('feature_model');
            $table->dropColumn('convention_and_trade');
        });
    }
}
