<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\Api\ApiAuthController;
use App\Model\EBikes;
use App\Model\Members;
use Illuminate\Support\Facades\DB;

class InfoAuthController extends ApiAuthController
{
    /**
     * 完善用户及车辆信息
     */
    public function store(){
        $input = $this->input;
        //缺少验证短信码
        unset($input['sms_code']);
        unset($input['_url']);
        if(!$eBike = EBikes::where("member_id",$this->currentMember->id)->first()){
            $eBike = new EBikes();
        }
        DB::beginTransaction();
        $member = Members::where("id", $this->currentMember->id)->first();
        foreach($input as $k=>$v){
            if($k == "realName" || $k == "mobile"){
                $member->$k = $v;
            }else{
                $eBike->$k = $v;
            }
        }
        $eBike->member_id = $this->currentMember->id;
        if(!$eBike->save()){
            DB::rollBack();
            return $this->error("保存失败");
        }
        if(!$member->save()){
            DB::rollBack();
            return $this->error("保存失败");
        }
        DB::commit();
        return $this->success();
    }
}
