<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;


Route::prefix(config('administrable.auth_prefix_path') . "/extensions/") ->middleware([Str::lower(config('administrable.guard')) . '.auth'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | EXTENSIONS -> Ad
    |--------------------------------------------------------------------------
    */
    Route::name(Str::lower(config('administrable.back_namespace')) . '.extensions.ads.')->group(function () {

        Route::name('ad.')->group(function () {
            Route::resource('ads', config('administrable-ad.controllers.back.ad'))->names([
                'index'      => 'index',
                'show'       => 'show',
                'create'     => 'create',
                'store'      => 'store',
                'edit'       => 'edit',
                'update'     => 'update',
                'destroy'    => 'destroy',
            ])->except(['show']);
        });
        Route::name('group.')->group(function () {
            Route::resource('groups', config('administrable-ad.controllers.back.group'))->names([
                'index'      => 'index',
                'show'       => 'show',
                'create'     => 'create',
                'store'      => 'store',
                'edit'       => 'edit',
                'update'     => 'update',
                'destroy'    => 'destroy',
            ])->except(['show']);
        });
    });
});
