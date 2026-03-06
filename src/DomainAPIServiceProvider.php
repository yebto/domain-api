<?php

namespace Yebto\DomainAPI;

use Illuminate\Support\ServiceProvider;

class DomainAPIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/yebto-domain.php', 'yebto-domain');

        $this->app->singleton('yebto-domain', function () {
            return new DomainAPI(config('yebto-domain'));
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/yebto-domain.php' => config_path('yebto-domain.php'),
        ], 'yebto-domain-config');
    }
}
