<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceListingsTable extends Migration
{
    public function up()
    {
        Schema::create('service_listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained('services');
            $table->json('services_included');
            $table->json('sub_features');
            $table->json('recommanded_addons');
            $table->json('faqs');
            $table->integer('timeline_in_minutes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_listings');
    }
}
