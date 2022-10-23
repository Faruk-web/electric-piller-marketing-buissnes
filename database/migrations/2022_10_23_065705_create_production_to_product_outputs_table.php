<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionToProductOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_to_product_outputs', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('invioce_number');
            $table->decimal('product_cost');
            $table->decimal('total_production');
            $table->integer('quantity');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_to_product_outputs');
    }
}
