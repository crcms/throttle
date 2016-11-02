<?php
namespace Simon\Throttle;

use Illuminate\Support\ServiceProvider;
use Simon\Safe\Contracts\SafeSubjectInterface;

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
            $this->configPath => config_path('safe.php'),
        ]);
    }


    /**
     *
     */
    public function register()
    {
        //合并 config
        $this->mergeConfigFrom($this->configPath, 'throttle');

        $this->app->singleton([SafeSubjectInterface::class=>'throttle'],Container::class);
    }


    /**
     * @return array
     */
    public function provides()
    {
        return ['throttle'];
    }

}