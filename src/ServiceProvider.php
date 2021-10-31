<?php

namespace Guysolamour\Administrable\Extensions\Ad;

use Illuminate\Support\Facades\Blade;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const PACKAGE_NAME = 'administrable-ad';

    public function boot()
    {
        $this->publishes([
            static::packagePath("config/". self::PACKAGE_NAME .".php") => config_path(self::PACKAGE_NAME . '.php'),
        ], self::PACKAGE_NAME . '-config');

        $this->publishes([
            static::packagePath('resources/lang') => resource_path('lang/vendor/' . static::PACKAGE_NAME),
        ], static::PACKAGE_NAME . '-lang');

        $this->loadRoutesFrom(static::packagePath("/routes/back.php"));

        $this->loadTranslationsFrom(static::packagePath('resources/lang'), static::PACKAGE_NAME);

        $this->loadMigrationsFrom([
            config(self::PACKAGE_NAME . '.migrations_path'),
        ]);

        $this->loadViewsFrom(static::packagePath('/resources/views/front'), self::PACKAGE_NAME);
        $this->loadViewsFrom(static::packagePath('/resources/views/back/' . config('administrable.theme')), self::PACKAGE_NAME);

        Blade::include(self::PACKAGE_NAME . '::front.ads._ad', 'ad');
        Blade::include(self::PACKAGE_NAME . '::front.ads._adgroup', 'adgroup');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            static::packagePath('config/'. self::PACKAGE_NAME .'.php'),
            self::PACKAGE_NAME
        );
    }

    public static function packagePath(string $path = ''): string
    {
        return  __DIR__ . '/../' . $path;
    }
}
