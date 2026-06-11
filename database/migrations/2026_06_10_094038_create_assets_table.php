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
        Schema::create('assets', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('asset_type_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('asset_code')->unique();

            $table->string('asset_name')->index();

            $table->string('serial_number')->nullable()->unique();

            $table->string('barcode')->nullable();

            $table->string('qr_code')->nullable();

            $table->decimal('purchase_cost', 15, 2);

            $table->decimal('current_value', 15, 2)->nullable();

            $table->date('purchase_date')->nullable()->index();

            $table->date('warranty_expiry')->nullable();

            $table->enum('asset_condition', [
                'new',
                'good',
                'fair',
                'poor',
                'damaged'
            ])->default('new');

            $table->enum('asset_status', [
                'available',
                'allocated',
                'maintenance',
                'disposed',
                'lost',
                'inactive'
            ])->default('available');

            $table->text('description')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
