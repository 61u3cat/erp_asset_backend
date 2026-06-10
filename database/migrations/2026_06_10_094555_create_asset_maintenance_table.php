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
        Schema::create('asset_maintenance', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('asset_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('maintenance_type');

            $table->decimal('maintenance_cost', 15, 2);

            $table->date('maintenance_date');

            $table->date('next_maintenance_date')->nullable();

            $table->text('remarks')->nullable();

            $table->index('asset_id');

            $table->index('maintenance_date');

            $table->index('next_maintenance_date');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_maintenance');
    }
};
