<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlanAttributesAndPlanTypesColumnToPlanGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_groups', function (Blueprint $table) {
            $table->string('plan_attributes')->nullable()->after('details');
            $table->string('plan_types')->nullable()->after('plan_attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_groups', function (Blueprint $table) {
            $table->dropColumn('plan_attributes');
            $table->dropColumn('plan_types');
        });
    }
}
