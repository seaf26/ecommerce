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
        Schema::table('products', function (Blueprint $table) {

            // $table->foreignId('subsection_id')->after('id')->constrained()->onDelete('cascade');
            $table->string('name')->after('subsection_id');
            $table->decimal('price')->after('name');
            $table->string('descraption')->after('price');
            $table->boolean('stock')->after('descraption');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
