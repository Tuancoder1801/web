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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // id BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('category_id'); // Kiểu BIGINT UNSIGNED
            $table->foreign('category_id')->references('id')->on('categories');  // Tham chiếu đúng tên bảng categories
            $table->string('name', 250); // name VARCHAR(250)
            $table->longText('description')->nullable(); // description LONGTEXT
            $table->integer('price'); // price INT
            $table->integer('discount')->nullable(); // discount INT
            $table->string('thumbnail', 500)->nullable(); // thumbnail VARCHAR(500)
            $table->integer('stock'); // stock INT
            $table->string('brand', 100); // brand VARCHAR(100)
            $table->string('connectivity', 225)->nullable(); // connectivity VARCHAR(225)
            $table->string('compatibility', 225)->nullable(); // compatibility VARCHAR(225)
            $table->string('product_color', 50)->nullable(); // product_color VARCHAR(50)
            $table->decimal('weight', 5, 2)->nullable(); // weight DECIMAL(5,2)
            $table->string('dimensions', 50)->nullable(); // dimensions VARCHAR(50)
            $table->string('battery_life', 50)->nullable(); // battery_life VARCHAR(50)
            $table->string('warranty', 50)->nullable(); // warranty VARCHAR(50)
            $table->dateTime('release_date')->nullable(); // release_date DATETIME
            $table->text('features')->nullable(); // features TEXT
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
