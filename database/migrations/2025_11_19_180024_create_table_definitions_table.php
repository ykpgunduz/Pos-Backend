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
        Schema::create('table_definitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cafe_id')->constrained('cafes')->onDelete('cascade');
            $table->string('name'); // Örn: "Bahçe 1", "Salon 2"
            $table->string('area')->nullable(); // Örn: "Bahçe", "Salon", "Teras"
            $table->integer('table_number'); // Masa numarası
            $table->integer('capacity')->nullable(); // Kaç kişilik masa
            $table->string('position_x')->nullable(); // X koordinatı (opsiyonel, layout için)
            $table->string('position_y')->nullable(); // Y koordinatı (opsiyonel, layout için)
            $table->boolean('is_active')->default(true); // Masa aktif mi?
            $table->text('notes')->nullable(); // Ek notlar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_definitions');
    }
};
