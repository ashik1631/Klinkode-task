<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cate_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->double('price');
            $table->integer('discount')->nullable();
            $table->text('short_desc');
            $table->longText('long_desc');
            $table->string('thumbnail');
            $table->json('multiple_image');
            $table->enum('new_product', ['1', '0'])->default('0');
            $table->enum('feature_product', ['1', '0'])->default('0');
            $table->enum('status', ['1', '0'])->default('1');
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