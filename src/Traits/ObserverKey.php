<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/3
 * Time: 15:16
 */

namespace CrCms\Throttle\Traits;


use Illuminate\Http\Request;

trait ObserverKey
{

    /**
     * @return string
     */
    public function key(Request $request) : string
    {
        return get_class($this).$request->ip();
    }

}