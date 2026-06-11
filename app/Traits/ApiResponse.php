<?php

namespace App\Traits;

class ApiResponse
{
    public static function success($data=null,$message='succes',$status=200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ],$status);
    }
        
    }
