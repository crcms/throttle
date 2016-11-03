<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/3
 * Time: 15:16
 */

namespace CrCms\Throttle\Traits;


trait ObserverKey
{

    /**
     * @return string
     */
    public function key() : string
    {
        return get_class($this);
    }

}