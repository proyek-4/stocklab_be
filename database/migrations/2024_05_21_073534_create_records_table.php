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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->integer('quantity');
            $table->date('date');
            $table->double('debit')->nullable();
            $table->double('kredit')->nullable();
            $table->double('saldo')->nullable();
            $table->string('record_type');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
