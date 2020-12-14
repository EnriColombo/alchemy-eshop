<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->foreignId('cart_id')->constrained();
            $table->decimal('total', 22)->default(0.00);
            $table->string('method')->nullable();
            $table->string('cardname')->nullable();
            $table->string('cardnumber')->nullable();
            $table->timestamp('cardexpiration')->nullable();
            $table->integer('cardcvv')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
