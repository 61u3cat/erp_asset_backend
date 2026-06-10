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
        Schema::create('depreciation_ledger', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('asset_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->decimal('depreciation_amount', 15, 2);

            $table->decimal('book_value', 15, 2);

            $table->index('asset_id');

            $table->index('depreciation_date');

            $table->date('depreciation_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depreciation_ledger');
    }
};
