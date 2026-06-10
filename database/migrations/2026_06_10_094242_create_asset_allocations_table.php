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
        Schema::create('asset_allocations', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('asset_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('employee_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamp('allocated_at');

            $table->date('expected_return_date')->nullable();

            $table->timestamp('returned_at')->nullable();

            $table->enum('allocation_status', [
                'allocated',
                'returned',
                'overdue'
            ])->default('allocated');

            $table->index('asset_id');

            $table->index('employee_id');

            $table->index('allocated_at');

            $table->index('allocation_status');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_allocations');
    }
};
