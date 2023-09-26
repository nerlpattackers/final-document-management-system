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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title')->nullable();
            $table->string('to')->nullable();
            $table->string('thru')->nullable();
            $table->string('from')->nullable();
            $table->string('subject')->nullable();
            $table->date('date')->nullable();
            $table->date('date_received')->nullable();
            $table->string('image')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('status')->default('incoming');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
