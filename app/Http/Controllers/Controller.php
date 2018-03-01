<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $input = [];
    protected $header = [];

    public function __construct(Request $request)
    {
        $this->input = $request->input();
        $this->header = $request->header();
    }

    public function success($data = '', $msg = '')
    {
        return response()->json([
            'status' => true,
            'data' => $data,
            'msg' => $msg
        ]);
    }

    public function error($msg = '')
    {
        return response()->json([
            'status' => false,
            'data' => '',
            'msg' => $msg
        ]);
    }
}
