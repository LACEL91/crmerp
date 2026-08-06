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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->constrained('customers')->restrictOnDelete();
            $table->foreignId('equipment_id')->constrained('equipments')->restrictOnDelete();
            $table->foreignId('receptionist_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('technician_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('current_state_id')->constrained('states')->restrictOnDelete();
            $table->integer('order_number')->unique();
            $table->integer('customer_order_number')->unique();
            $table->integer('warranty_of_folio')->nullable();
            $table->boolean('urgent')->default(0);
            $table->boolean('invoice_required')->default(false);
            
            // Decisiones de negocio (inputs de calculateCharges)
            $table->boolean('apply_diagnosis')->default(false);  // resta el DX pagado del balance del servicio
            $table->boolean('apply_discounts')->default(false);  // incluye cupones pending_apply en el cálculo

            // Campos cacheados — actualizados por WorkOrderObserver
            // Cada uno corresponde 1:1 a una clave del return de calculateCharges()
            $table->decimal('cached_paid', 10, 2)->default(0);              // totals['paid']
            $table->decimal('cached_pending', 10, 2)->default(0);           // totals['pending']
            $table->decimal('cached_discount', 10, 2)->default(0);          // totals['discounts']
            $table->decimal('cached_discount_pending', 10, 2)->default(0);  // totals['coupon_pending']  (nuevo)
            $table->decimal('cached_diagnosis_applied', 10, 2)->default(0); // totals['diagnosis_applied']
            $table->decimal('cached_subtotal', 10, 2)->default(0);          // totals['subtotal']
            $table->decimal('cached_tax_paid', 10, 2)->default(0);          // totals['tax_paid']
            $table->decimal('cached_tax_pending', 10, 2)->default(0);       // totals['tax_pending']  (nuevo)
            $table->decimal('cached_total', 10, 2)->default(0);             // totals['total']
            $table->decimal('cached_balance_due', 10, 2)->default(0);       // totals['balance']

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};