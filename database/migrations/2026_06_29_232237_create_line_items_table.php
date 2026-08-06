<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('work_order_id')->constrained('work_orders')->cascadeOnDelete();

            // Información mostrada al cliente
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->string('quote_status')->default('not_required'); // NOT_REQUIRED | PENDING | SEARCHING | QUOTED | UNAVAILABLE
            $table->string('approval_status')->default('not_required'); // NOT_REQUIRED | PRE_APPROVED | APPROVED | PENDING | REJECTED
            $table->timestamp('quoted_at')->nullable();
            $table->timestamp('approved_at')->nullable();

            // Observaciones comerciales
            $table->text('notes')->nullable();

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
        Schema::dropIfExists('line_items');
    }
}
