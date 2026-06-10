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
        Schema::create('asset_disposals', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('asset_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->text('disposal_reason');

            $table->decimal('disposal_amount', 15, 2)->nullable();

            $table->timestamp('disposed_at');

            $table->index('asset_id');

            $table->index('disposed_at');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_disposals');
    }
};
