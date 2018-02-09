<?php

namespace App\Http\Controllers\Api\Member;

use App\Model\Members;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 用户首次进入逻辑
     * 1.没有该用户，注册
     * 2.返回该用户信息
     */
    public function index(Request $request)
    {
        phpinfo();
        /*print_r($request->input());
        if ($member = Members::where("nickName", "小红")->first()) {
            print_r($member->toArray());
        }*/
    }
}