<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Cash, Sr Pago, etc.
            $table->string('name'); // Cash, Sr Pago, etc.
            $table->string('provider')->nullable(); // Sr Pago, Zettle, etc.
            $table->enum('type', ['na', 'cash', 'card', 'transfer']);
            $table->enum('card_type', ['debit', 'credit'])->nullable();
            $table->boolean('has_fee')->default(false);
            $table->decimal('fee_percentage', 5, 2)->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}
