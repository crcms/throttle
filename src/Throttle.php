<?php
namespace CrCms\Throttle;

use CrCms\Throttle\Contracts\ThrottleObserverInterface;
use CrCms\Throttle\Contracts\ThrottleSubjectInterface;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Cache\Repository as Cache;

class Throttle implements ThrottleSubjectInterface
{

    /**
     * @var Cache|null
     */
    protected $cache = null;

    /**
     * @var Request|null
     */
    protected $request = null;


    /**
     * Container constructor.
     * @param Cache $cache
     * @param Request $request
     */
    public function __construct(Cache $cache,Request $request)
    {
        $this->cache = $cache;
        $this->request = $request;
    }


    /**
     * @param string $className
     * @return string
     */
    protected function key(ThrottleObserverInterface $observer) : string
    {
        return $observer->key($this->request);
    }


    /**
     * @param string $className
     */
    public function attach(ThrottleObserverInterface $observer)
    {
        $cacheName = $this->key($observer);

        if ($this->cache->has($cacheName))
        {
            $cache = $this->cache->get($cacheName);
            $cache['frequency'] = intval($cache['frequency'])+1;
            $cache['time'] = time();
        }
        else
        {
            $cache = [
                'frequency'=>1,
                'ip'=>$this->request->ip(),
                'time'=>time(),
            ];
        }

        $this->cache->forever($cacheName,$cache);
    }


    /**
     * @param string $className
     */
    public function detach(ThrottleObserverInterface $observer)
    {
        // TODO: Implement detach() method.
        $cacheName = $this->key($observer);

        if ($this->cache->has($cacheName))
        {
            $this->cache->forget($cacheName);
        }
    }


    /**
     * @param ThrottleObserverInterface $observer
     * @return mixed|null
     */
    public function notify(ThrottleObserverInterface $observer)
    {
        // TODO: Implement notify() method.
        $cacheName = $this->key($observer);

        if ($this->cache->has($cacheName))
        {
            return $observer->handle($this->cache->get($cacheName),$this);
        }

        return null;
    }

}