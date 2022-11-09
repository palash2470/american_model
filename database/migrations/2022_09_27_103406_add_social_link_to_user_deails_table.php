<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialLinkToUserDeailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('facebook_link')->default('#')->after('training');
            $table->string('youtube_link')->default('#')->after('facebook_link');
            $table->string('twitter_link')->default('#')->after('youtube_link');
            $table->string('linkedin_link')->default('#')->after('twitter_link');
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
            $table->dropColumn('facebook_link');
            $table->dropColumn('youtube_link');
            $table->dropColumn('twitter_link');
            $table->dropColumn('linkedin_link');
        });
    }
}
