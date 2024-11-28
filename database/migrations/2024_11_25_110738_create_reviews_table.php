<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->tinyInteger('ratings')->unsigned(); // ratings: 1-5
            $table->text('review');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('user_profiles')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services_listing')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
