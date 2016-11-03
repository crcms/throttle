<?php

namespace CrCms\Throttle\Contracts;


interface ThrottleObserverInterface
{

    /**
     * @param array $data
     * @param ThrottleSubjectInterface $subject
     * @return mixed
     */
    public function handle(array $data,ThrottleSubjectInterface $subject);

    /**
     * @return string
     */
    public function key() : string ;

}