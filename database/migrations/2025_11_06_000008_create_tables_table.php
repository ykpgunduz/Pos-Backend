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
		Schema::create('tables', function (Blueprint $table) {
			$table->id();
			$table->foreignId('cafe_id')->constrained('cafes')->cascadeOnDelete();
			$table->integer('table_number')->nullable();
			$table->string('order_number')->nullable();
			$table->integer('customer')->nullable();
			$table->string('status')->nullable();
			$table->integer('treat')->nullable();
			$table->integer('total_amount')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('tables');
	}
};
