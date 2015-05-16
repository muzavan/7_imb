<?php
namespace Barryvdh\DomPDF;

use Exception;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @throws \Exception
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/dompdf.php';
        $this->mergeConfigFrom($configPath, 'dompdf');
    }

    public function boot()
    {
        $configPath = __DIR__ . '/../config/dompdf.php';
        $this->publishes([$configPath => config_path('dompdf.php')], 'config');
        
        $defines = $this->app['config']->get('dompdf.defines') ?: array();
        foreach ($defines as $key => $value) {
            $this->define($key, $value);
        }

        //Still load these values, in case config is not used.
        $this->define("DOMPDF_ENABLE_REMOTE", true);
        $this->define("DOMPDF_ENABLE_AUTOLOAD", false);
        $this->define("DOMPDF_CHROOT", $this->app['path.base']);
        $this->define("DOMPDF_LOG_OUTPUT_FILE", $this->app['path.storage'] . '/logs/dompdf.html');

        $config_file = $this->app['config']->get(
            'dompdf.config_file'
        ) ?: $this->app['path.base'] . '/vendor/dompdf/dompdf/dompdf_config.inc.php';

        if (file_exists($config_file)) {
            require_once $config_file;
        } else {
            throw new Exception(
                "$config_file cannot be loaded, please configure correct config file (dompdf.config_file)"
            );
        }
        
        $this->app->bind('dompdf', function ($app) {
                return new PDF($app['config'], $app['files'], $app['view'], $app['path.public']);
            });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('dompdf');
    }
   
    /**
     * Define a value, if not already defined
     * 
     * @param string $name
     * @param string $value
     */
    protected function define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }

}
