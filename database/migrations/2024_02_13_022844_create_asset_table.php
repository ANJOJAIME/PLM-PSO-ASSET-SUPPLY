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
        Schema::create('asset', function (Blueprint $table) {
            $table->string('item_no')->unique();
            $table->string('class_id');
            $table->string('category');
            $table->string('description');
            $table->string('details');
            $table->string('po_no');
            $table->string('supplier');
            $table->string('address');
            $table->integer('tel_no');
            $table->integer('tin_no');
            $table->date('date');
            $table->string('mode_of_proc');
            $table->string('pr_no');
            $table->string('place_dev');
            $table->date('date_dev');
            $table->integer('price_val');
            $table->string('payment_term');
            $table->integer('quantity');
            $table->string('unit');
            $table->integer('unit_cost');
            $table->integer('amount');
            $table->integer('sub_total');
            $table->string('iar_no');
            $table->string('bur_no');
            $table->date('date_po');
            $table->string('invoice_no');
            $table->string('req_office');
            $table->date('date_invoice');
            $table->date('date_inspected');
            $table->date('date_received');
            $table->string('par_no');
            $table->integer('issuance_qty');
            $table->string('name_desc');
            $table->date('date_acquired');
            $table->string('property_no');
            $table->integer('total_value_issued');
            $table->string('entity_name');
            $table->string('fund_cluster');
            $table->string('name_accountable');
            $table->string('accumulated_losses');
            $table->integer('carrying_amount');
            $table->integer('disposal');
            $table->integer('appraised_value');
            $table->integer('record_sale');
            $table->string('name_lgu');
            $table->string('purpose');
            $table->string('enduser');
            $table->date('date_returned');
            $table->date('date_received_hauling');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset');
    }
};
