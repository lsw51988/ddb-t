<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EBikes extends Model
{
    const BRAND = [
        "爱玛", "雅迪", "新日", "小牛",
        "E客", "台铃", "速珂", "小刀",
        "绿源", "立马", "小米", "新大洲",
        "安马达", "大阳", "超威"
    ];

    const VOLTAGE = [
        "48V", "60V", "72V", "其他"
    ];

    const BUYSTATUS_NEW = 1;
    const BUYSTATUS_OLD = 2;
}
