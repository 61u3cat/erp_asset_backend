<?php

namespace App\Http\Controllers\Api;

use App\Models\Asset;
use App\Models\AssetMaintenance;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;

class AssetController extends Controller
{


    public function index()
    {
        return ApiResponse::success(Asset::all());
    }
}
