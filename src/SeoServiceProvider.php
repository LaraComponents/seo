<?php

namespace LaraComponents\Seo;

use LaraComponents\Seo\Title;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SeoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootConfig();
        $this->bootDirectives();
    }

    protected function bootConfig()
    {
        $configFile = __DIR__.'/../config/seo.php';

        $this->publishes([
            $configFile => config_path('seo.php'),
        ]);

        $this->mergeConfigFrom($configFile, 'seo');
    }

    protected function bootDirectives()
    {
        Blade::directive('title', function ($expression) {
            return "<?php app('seo.title')->append($expression); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('seo.title', function ($app) {
            return new Title($app->make('config')->get('seo.title'));
        });
    }

    public function provide()
    {
        return [
            'seo.title',
        ];
    }
}
