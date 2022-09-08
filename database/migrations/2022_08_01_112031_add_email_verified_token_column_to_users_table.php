<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailVerifiedTokenColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email_verify_token')->nullable()->after('user_type');
            $table->tinyInteger('is_email_verified')->default(0)->after('email_verify_token');
            $table->tinyInteger('is_verified')->default(0)->after('is_email_verified');
            $table->tinyInteger('status')->default(1)->after('is_verified');
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
            $table->dropColumn('email_verify_token');
            $table->dropColumn('is_email_verified');
            $table->dropColumn('is_verified');
            $table->dropColumn('status');
        });
    }
}
