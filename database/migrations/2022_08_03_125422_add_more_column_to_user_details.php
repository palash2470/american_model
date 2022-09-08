<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnToUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->integer('eye_color')->nullable()->after('profile_image');
            $table->integer('skin_color')->nullable()->after('eye_color');
            $table->integer('hair_color')->nullable()->after('skin_color');
            $table->integer('hair_lenth')->nullable()->after('hair_color');
            $table->integer('weight')->nullable()->after('hair_lenth');
            $table->integer('height')->nullable()->after('weight');
            $table->integer('height_id')->nullable()->after('height');
            $table->integer('ethnicity')->nullable()->after('height_id');
            $table->decimal('shoe_size',2,1)->nullable()->after('ethnicity');
            $table->integer('waist')->nullable()->after('shoe_size');
            $table->integer('waist_id')->nullable()->after('waist');
            $table->integer('chest')->nullable()->after('waist_id');
            $table->integer('chest_id')->nullable()->after('chest');
            $table->integer('dress_size')->nullable()->after('chest_id');
            $table->integer('hip')->nullable()->after('dress_size');
            $table->integer('hip_id')->nullable()->after('hip');
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
            $table->dropColumn('eye_color');
            $table->dropColumn('skin_color');
            $table->dropColumn('hair_color');
            $table->dropColumn('hair_lenth');
            $table->dropColumn('weight');
            $table->dropColumn('height_id');
            $table->dropColumn('ethnicity');
            $table->dropColumn('shoe_size');
            $table->dropColumn('waist');
            $table->dropColumn('waist_id');
            $table->dropColumn('chest');
            $table->dropColumn('chest_id');
            $table->dropColumn('dress_size');
            $table->dropColumn('hip');
            $table->dropColumn('hip_id');
        });
    }
}
