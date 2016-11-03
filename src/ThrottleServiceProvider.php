<?php
namespace Simon\Throttle;

use CrCms\Throttle\Contracts\ThrottleSubjectInterface;
use CrCms\Throttle\Throttle;
use Illuminate\Support\ServiceProvider;

class ThrottleServiceProvider extends ServiceProvider
{

    /**
     * @var bool
     */
    protected $defer = true;


    /**
     * @var string
     */
    protected $configPath = __DIR__.'/../config/throttle.php';


    /**
     *
     */
    public function boot()
    {
        $this->publishes([
            $this->configPath => config_path('throttle.php'),
        ]);
    }


    /**
     *
     */
    public function register()
    {
        //合并 config
        $this->mergeConfigFrom($this->configPath, 'throttle');

        $this->app->singleton([ThrottleSubjectInterface::class=>'throttle'],Throttle::class);
    }


    /**
     * @return array
     */
    public function provides()
    {
        return ['throttle'];
    }

}