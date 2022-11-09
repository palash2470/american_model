<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job', function (Blueprint $table) {
            $table->string('seeking')->nullable()->after('title');
            $table->string('compensation')->nullable()->after('gender');
            $table->string('height')->nullable()->after('toJobDate');
            $table->longText('jobPreference')->nullable()->after('jobDescription');
            $table->longText('jobRequirement')->nullable()->after('jobPreference');
            $table->string('image')->nullable()->change();
            $table->date('fromJobDate')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job', function (Blueprint $table) {
            $table->dropColumn('seeking');
            $table->dropColumn('compensation');
            $table->dropColumn('height');
            $table->dropColumn('jobPreference');
            $table->dropColumn('jobRequirement');
        });
    }
}
