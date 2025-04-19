<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên sản phẩm
            $table->string('image'); // Đường dẫn hình ảnh sản phẩm
            $table->decimal('price', 10, 2); // Giá gốc
            $table->decimal('sale_price', 10, 2)->nullable(); // Giá giảm (nếu có)
            $table->boolean('is_new')->default(false); // Cột xác định sản phẩm mới
            $table->json('colors')->nullable(); // Màu sắc sản phẩm, lưu dưới dạng JSON
            $table->timestamps(); // Tự động thêm created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
