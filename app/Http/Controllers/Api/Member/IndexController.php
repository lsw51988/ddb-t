<?php

namespace App\Http\Controllers\Api\Member;

use App\Model\Members;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\Captcha;

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
        if (!$member = Members::where("nickName", $data['nickName'])->first()) {
            $member = new Members();
            $member->avatarUrl = $data['avatarUrl'];
            $member->nickName = $data['nickName'];
            $member->gender = $data['gender'];
            $member->city = $data['city'];
            $member->province = $data['province'];
            $member->country = $data['country'];
            $member->language = $data['language'];
            $member->token = md5($data['nickName'] . time() . rand(0, 9999));
            $member->token_time = date("Y-m-d H:i:s", strtotime("+1 month"));
            if (!$member->save()) {
                return $this->error("数据库保存错误");
            }
        }
        if (Cache::get($member->token)) {
            return $this->success($member);
        } else {
            $member->token = md5($data['nickName'] . time() . rand(0, 9999));
            $member->token_time = date("Y-m-d H:i:s", strtotime("+1 month"));
            Cache::put($member->token, serialize($member), 30 * 24 * 60);
            if (!$member->save()) {
                return $this->error("数据库保存错误");
            }
            return $this->success($member);
        }
    }

    /**
     * 获取图形验证码
     */
    public function captcha(Request $request)
    {
        $_vc = new Captcha();  //实例化一个对象
        session(['captcha' =>  $_vc->getCode()]);
        $_vc->doimg();
    }

    /**
     * 验证图形验证码
     */
    public function verifyCaptcha(Request $request)
    {
        $captcha = $request->input('captcha');
        if(session('captcha')==$captcha){
            return $this->success();
        }
        return $this->error();
    }


}