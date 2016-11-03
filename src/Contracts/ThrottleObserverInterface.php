<?php

namespace CrCms\Throttle\Contracts;


use Illuminate\Http\Request;

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
    public function key(Request $request) : string ;

}