<?php
/**
 * Created by PhpStorm.
 * User: lsw
 * Date: 18-2-11
 * Time: 下午2:38
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function save($data)
    {
        foreach ($data as $k => $v) {
            $this->$k = $v;
        }
        return $this->save();
    }
}