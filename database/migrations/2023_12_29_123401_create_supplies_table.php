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
        Schema::create('supplies', function (Blueprint $table) {
            //$table->id();
            $table->string('stock_no');
            $table->string('description');
            $table->string('unit')->nullable();
            $table->integer('delivered')->nullable();
            $table->integer('issued')->nullable();
            $table->integer('balance_after')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
        DB::unprepared('
            CREATE TRIGGER balance_after_insert_trigger 
            BEFORE INSERT ON supplies 
            FOR EACH ROW 
            SET NEW.balance_after = NEW.delivered - NEW.issued;
        ');

        DB::unprepared('
            CREATE TRIGGER balance_after_update_trigger 
            BEFORE UPDATE ON supplies 
            FOR EACH ROW 
            SET NEW.balance_after = NEW.delivered - NEW.issued;
        ');

        DB::unprepared('
            CREATE TRIGGER status_insert_trigger 
            BEFORE INSERT ON supplies 
            FOR EACH ROW 
            SET NEW.balance_after = NEW.delivered - NEW.issued,
                NEW.status = CASE
                    WHEN NEW.balance_after <= 50 THEN "LOW LEVEL"
                    WHEN NEW.balance_after > 50 AND NEW.balance_after < 100 THEN "MID LEVEL"
                    ELSE "HIGH LEVEL"
                END;
        ');

        DB::unprepared('
            CREATE TRIGGER status_update_trigger 
            BEFORE UPDATE ON supplies 
            FOR EACH ROW 
            SET NEW.balance_after = NEW.delivered - NEW.issued,
                NEW.status = CASE
                    WHEN NEW.balance_after <= 50 THEN "LOW LEVEL"
                    WHEN NEW.balance_after > 50 AND NEW.balance_after < 100 THEN "MID LEVEL"
                    ELSE "HIGH LEVEL"
                END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
