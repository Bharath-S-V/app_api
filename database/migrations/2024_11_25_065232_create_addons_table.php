<?php

// database/migrations/xxxx_xx_xx_create_addons_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonsTable extends Migration
{
    public function up()
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);  // Price column
            $table->string('image')->nullable();  // Image upload column
            $table->json('features')->nullable(); // Store selected features as a JSON array
            $table->string('timeline'); // Timeline column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('addons');
    }
}
