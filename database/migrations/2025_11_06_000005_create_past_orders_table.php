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
		Schema::create('past_orders', function (Blueprint $table) {
			$table->id();
			$table->foreignId('cafe_id')->constrained('cafes')->cascadeOnDelete();
			$table->string('order_number')->index();
			$table->integer('table_number')->nullable();
			$table->integer('customer')->nullable();
			$table->integer('total_amount')->default(0);
			$table->integer('net_amount')->default(0);
			$table->integer('cash')->nullable();
			$table->integer('card')->nullable();
			$table->string('iban')->nullable();
			$table->integer('treat')->nullable();
			$table->string('self_treat')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('past_orders');
	}
};
