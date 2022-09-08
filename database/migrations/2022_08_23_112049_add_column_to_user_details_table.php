<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('exprience')->after('hip_id')->nullable();
            $table->string('compensation')->after('exprience')->nullable();
            $table->string('interested')->after('compensation')->nullable();
            $table->longText('biography')->after('interested')->nullable();
            $table->string('cover_img')->after('biography')->nullable();
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
            $table->dropColumn('exprience');
            $table->dropColumn('compensation');
            $table->dropColumn('interested');
            $table->dropColumn('biography');
            $table->dropColumn('cover_img');
        });
    }
}
