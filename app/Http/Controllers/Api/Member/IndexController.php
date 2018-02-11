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
        $data = $request->input();
        return $this->success($data);
        if (!$member = Members::where("nickName", $request['nickName'])->first()) {
            $member = new Members();
            if (!$member->save($request)) {
                return $this->error("数据库保存错误");
            }
            return $this->success($member);
        }
    }
}