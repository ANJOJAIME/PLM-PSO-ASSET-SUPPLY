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
            $table->softDeletes();
            $table->string('at_are_no');
            $table->string('at_received_from');
            $table->string('at_received_by');
            $table->string('at_received_from_office');
            $table->string('at_used_in_office');
            $table->date('at_date_received');
            $table->string('at_end_user');
            $table->string('at_new_are_no');
            $table->string('at_prs_no');
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
