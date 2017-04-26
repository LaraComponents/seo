<?php

namespace LaraComponents\Seo;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use LaraComponents\Seo\Entities\Description;
use LaraComponents\Seo\Entities\Keywords;
use LaraComponents\Seo\Entities\Title;

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
            return "<?php app('seo.title')->add($expression); ?>";
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

        $this->app->singleton('seo.description', function ($app) {
            return new Description($app->make('config')->get('seo.description'));
        });

        $this->app->singleton('seo.keywords', function ($app) {
            return new Keywords($app->make('config')->get('seo.keywords'));
        });
    }

    public function provide()
    {
        return [
            'seo.title',
        ];
    }
}
