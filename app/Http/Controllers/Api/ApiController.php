<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27
 * Time: 21:05
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $token ="";
    public function __construct(Request $request)
    {
        $this->token = $request->header('token');
    }
}