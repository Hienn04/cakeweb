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
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('price');
            $table->unsignedBigInteger('category_id');
            $table->string('image');
            $table->unsignedInteger('status')->default(1);
            $table->integer('quantity')->comment('Day la so luong san pham trong kho');
            $table->boolean('in_cart')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Đảm bảo rằng nếu có lỗi, ta có thể rollback mà không gây lỗi
            $table->dropColumn(['in_cart', 'cart_quantity', 'cart_session_id']);
        });
    }
};
