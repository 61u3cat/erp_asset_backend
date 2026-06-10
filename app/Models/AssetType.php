<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\BaseModel;

class AssetType extends BaseModel
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function category()
    {
        return $this->belongsTo(AssetCategory::class);
    }
}
