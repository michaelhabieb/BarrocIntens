<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('invoice_products', function (Blueprint $table) {
        $table->id();
        $table->integer('quantity');
        $table->decimal('price_per_product', 10, 2);
        $table->foreignId('invoice_id')->constrained()->onDelete('cascade'); // FK to Invoices
        $table->foreignId('product_id')->constrained()->onDelete('cascade'); // FK to Products
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_products');
    }
};
