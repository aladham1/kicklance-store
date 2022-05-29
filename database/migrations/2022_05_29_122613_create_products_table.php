<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->double('cost')->default(0);
            $table->double('price')->default(0);
            $table->double('sale_price')->nullable();
            $table->unsignedInteger('quantity')->default(0);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')
                ->on('categories')->cascadeOnDelete();
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
        Schema::dropIfExists('products');
    }
};
