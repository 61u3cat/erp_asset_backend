<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends BaseModel
{
    use SoftDeletes;
    protected $fillable = [
        'uuid',
        'asset_type_id',
        'vendor_id',
        'branch_id',
        'asset_code',
        'asset_name',
        'serial_number',
        'barcode',
        'qr_code',
        'purchase_cost',
        'current_value',
        'purchase_date',
        'warranty_expiry',
        'asset_condition',
        'asset_status',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'purchase_cost' => 'decimal:2',
            'current_value' => 'decimal:2',
            'purchase_date' => 'date',
            'warranty_expiry' => 'date',
        ];
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
    public function assetType()
    {
        return $this->belongsTo(AssetType::class);
    }

    public function allocations()
    {
        return $this->hasMany(AssetAllocation::class);
    }

    public function maintenances()
    {
        return $this->hasMany(AssetMaintenance::class);
    }

    public function depreciations()
    {
        return $this->hasMany(DepreciationLedger::class);
    }

    public function disposals()
    {
        return $this->hasMany(AssetDisposal::class);
    }
} 
