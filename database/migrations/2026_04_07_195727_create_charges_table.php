<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_order_id')->constrained('work_orders')->onDelete('cascade');
            $table->foreignId('charge_type_id')->constrained('charge_types')->onDelete('cascade');
            $table->foreignId('charge_status_id')->constrained('charge_statuses')->onDelete('cascade');
            $table->foreignId('payment_method_id')->nullable()->constrained('payment_methods')->onDelete('cascade');
            $table->uuid('uuid')->nullable()->unique();
            $table->string('concept');
            $table->string('description')->nullable();
            $table->string('source')->nullable(); // manual | system | line_item
            $table->string('reference_type')->nullable(); // ej. work_order_line_item
            $table->integer('reference_id')->nullable(); // ej. line_item_id
            $table->decimal('amount', 10, 2)->default(0);
            $table->boolean('apply_tax')->default(false);
            $table->decimal('tax_rate', 10, 2)->default(0);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->string('tax_status')->nullable(); // pending | paid | waived
            $table->decimal('total_amount', 10, 2)->default(0);
            
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
        Schema::dropIfExists('charges');
    }
}
