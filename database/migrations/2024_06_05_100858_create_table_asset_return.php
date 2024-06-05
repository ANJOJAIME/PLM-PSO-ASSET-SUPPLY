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
        Schema::create('asset_return', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('accoutable_id');
            $table->string('are_no');
            $table->string('property_no');
            $table->date('transaction_date');
            $table->string('site');
            $table->string('location');
            $table->string('office');
            $table->string('condition');
            $table->string('other_user');
            $table->boolean('is_returned')->default(false);
            $table->date('date_returned')->nullable();
            $table->string('condition_returned')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_return');
    }
};
