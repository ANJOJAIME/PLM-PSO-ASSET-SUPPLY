<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('asset', function (Blueprint $table) {
            $table->boolean('po_added')->default(false);
        }); 
    }

    /**
     * here
     */
    public function down(): void
    {
        Schema::table('asset', function (Blueprint $table) {
            //
        });
    }
};
