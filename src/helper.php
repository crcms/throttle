<?php
use CrCms\Throttle\Contracts\ThrottleObserverInterface;


if (!function_exists('throttle'))
{
    /**
     * @return \Illuminate\Foundation\Application|mixed
     */
    function throttle()
    {
        return app('throttle');
    }
}


if (!function_exists('throttle_attach'))
{
    /**
     * @param ThrottleObserverInterface $observer
     * @return mixed
     */
    function throttle_attach(ThrottleObserverInterface $observer)
    {
        return app('throttle')->attach($observer);
    }
}


if (!function_exists('throttle_detach'))
{
    /**
     * @param ThrottleObserverInterface $observer
     * @return mixed
     */
    function throttle_detach(ThrottleObserverInterface $observer)
    {
        return app('throttle')->detach($observer);
    }
}


if (!function_exists('throttle_notify'))
{
    /**
     * @param ThrottleObserverInterface $observer
     * @return mixed
     */
    function throttle_notify(ThrottleObserverInterface $observer)
    {
        return app('throttle')->notify($observer);
    }
}