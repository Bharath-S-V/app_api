<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('car_washers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->text('business_address')->nullable();
            $table->json('photos')->nullable(); // For washing center photos
            $table->decimal('service_radius', 5, 2)->nullable(); // in kilometers
            $table->json('services_offered')->nullable();
            $table->json('availability_schedule')->nullable();
            $table->string('status')->default('pending'); // approval status
            $table->json('verification_documents')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_washers');
    }
};
