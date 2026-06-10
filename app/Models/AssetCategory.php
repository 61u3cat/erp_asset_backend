<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AssetCategory extends BaseModel
{
    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->uuid = Str::uuid();
    });
}
public function assetTypes()
{
    return $this->hasMany(AssetType::class);
}
}
