<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSummaryToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('summary')->nullable();
            $table->string('profession')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('pinterest')->nullable();
            $table->integer('fav_photo_1_id')->nullable()->unsigned()->index();
            $table->integer('fav_photo_2_id')->nullable()->unsigned()->index();
            $table->integer('fav_photo_3_id')->nullable()->unsigned()->index();
            $table->integer('fav_photo_4_id')->nullable()->unsigned()->index();

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
            //

            $table->dropColumn('summary');
            $table->dropColumn('profession');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('pinterest');
            $table->dropColumn('fav_photo_1_id');
            $table->dropColumn('fav_photo_2_id');
            $table->dropColumn('fav_photo_3_id');
            $table->dropColumn('fav_photo_4_id');

        });
    }
}
