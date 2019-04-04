<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->integer('categories_id')->unsigned()->index();
            $table->integer('sub_category_id')->unsigned()->index()->nullable();
            $table->integer('is_active')->default(0);
            $table->string('name');
            $table->string('description');
            $table->timestamps();


            $table -> foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
