<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/25
 * Time: 7:49
 */

namespace CrCms\Throttle\Contracts;


interface ThrottleSubjectInterface
{

    /**
     * @param ThrottleObserverInterface $observer
     * @return mixed
     */
    public function attach(ThrottleObserverInterface $observer);


    /**
     * @param ThrottleObserverInterface $observer
     * @return mixed
     */
    public function detach(ThrottleObserverInterface $observer);


    /**
     * @param ThrottleObserverInterface $observer
     * @return mixed
     */
    public function notify(ThrottleObserverInterface $observer);

}