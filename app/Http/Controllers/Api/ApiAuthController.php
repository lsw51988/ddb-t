<?php
/**
 * Created by PhpStorm.
 * User: lsw
 * Date: 18-2-27
 * Time: 下午4:54
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    protected $token = "";
    protected $currentMember = "";

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->token = $request->header('token');

        if (Cache::has($this->token)) {
            $cValue = cache($this->token);
            cache($this->token,$cValue,30*24*60);
            $this->currentMember = unserialize($cValue);
        } else {
            return $this->error("请重新登录");
        }
    }
}