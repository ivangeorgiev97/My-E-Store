<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductDiscountPriceToProducts extends Migration 
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::table('products', function($table) {
            $table->decimal('product_discount_price', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() 
    {
        Schema::table('products', function($table) {
            $table->dropColumn('product_discount_price');
        });
    }

}
