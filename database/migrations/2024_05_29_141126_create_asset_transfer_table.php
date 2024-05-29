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
        Schema::create('asset_transfer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('are_no');
            $table->string('received_from')->nullable();
            $table->string('received_by')->nullable();
            $table->string('received_from_office')->nullable();
            $table->string('used_in_office')->nullable();
            $table->date('date_received')->nullable();
            $table->string('end_user')->nullable();
            $table->string('new_are_no')->nullable();
            $table->string('prs_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_transfer');
    }
};
