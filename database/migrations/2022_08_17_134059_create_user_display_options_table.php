<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDisplayOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_display_options', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('age_display')->default(1)->comment('1=Public,2=Member,3=Private');
            $table->integer('weight_display')->default(1)->comment('1=Public,2=Member,3=Private');
            $table->integer('my_comment_display')->default(1)->comment('1=Public,2=Member,3=Private');
            $table->integer('pic_comment_display')->default(1)->comment('1=Public,2=Member,3=Private');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_display_options');
    }
}
