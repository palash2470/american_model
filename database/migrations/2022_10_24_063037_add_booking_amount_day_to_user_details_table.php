<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookingAmountDayToUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn('booking_amount');
            $table->dropColumn('booking_amount_per');
            $table->double('booking_amount_hour')->after('zip_code')->nullable();
            $table->double('booking_amount_day')->after('booking_amount_hour')->nullable();
            $table->double('booking_amount_week')->after('booking_amount_day')->nullable();
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
            $table->dropColumn('booking_amount_hour');
            $table->dropColumn('booking_amount_day');
            $table->dropColumn('booking_amount_week');
        });
    }
}
