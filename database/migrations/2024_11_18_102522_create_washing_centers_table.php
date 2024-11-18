<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('washing_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('business_address');
            $table->string('contact_number');
            $table->string('email')->nullable();
            $table->json('photos')->nullable();
            $table->integer('capacity');
            $table->json('services')->nullable(); // Store types and prices as JSON
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('washing_centers');
    }
};
