<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data,$msg=''){
        return response()->json([
            'status'=>true,
            'data'=>$data,
            'msg'=>$msg
        ]);
    }

    public function error($msg=''){
        return response()->json([
            'status'=>false,
            'data'=>'',
            'msg'=>$msg
        ]);
    }
}
