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
        Schema::dropColumns('sections', ['product_name', 'product_category', 'price', 'date_of_creation', 'date_of_sell', 'status']);
        Schema::table('sections', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->text('img')->after('name')->nullable();





        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
