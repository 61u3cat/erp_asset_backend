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

            $table->string('asset_name');

            $table->string('serial_number')->nullable()->unique();

            $table->string('barcode')->nullable();

            $table->string('qr_code')->nullable();

            $table->decimal('purchase_cost', 15, 2);

            $table->decimal('current_value', 15, 2)->nullable();

            $table->date('purchase_date')->nullable();

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

            $table->index('asset_type_id');

            $table->index('asset_status');

            $table->index('asset_condition');

            $table->index('purchase_date');

            $table->index('asset_name');

            // $table->index('vendor_id');

            // $table->index('branch_id');

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
