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
		Schema::create('order_items', function (Blueprint $table) {
			$table->id();
			$table->foreignId('cafe_id')->constrained('cafes')->cascadeOnDelete();
			$table->integer('table_number')->nullable();
			$table->string('order_number')->index();
			$table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
			$table->integer('product_price')->default(0);
			$table->string('note')->nullable();
			$table->integer('quantity')->default(1);
			$table->string('status')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('order_items');
	}
};
