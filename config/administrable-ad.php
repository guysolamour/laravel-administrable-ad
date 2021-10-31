<?php

return [
    /*
    |--------------------------------------------------------------------------
    | EXTENSIONS -> Ad
    |--------------------------------------------------------------------------
    |
    | The migrations folder in database directory
    */
    'migrations_path' => database_path('extensions/ad'),
    'models'      => [
        'ad'      => Guysolamour\Administrable\Extensions\Ad\Models\Ad::class,
        'group'   => Guysolamour\Administrable\Extensions\Ad\Models\Group::class,
        'type'    => Guysolamour\Administrable\Extensions\Ad\Models\Type::class,
    ],
    'controllers' => [
        'back'  => [
            'ad'    =>  Guysolamour\Administrable\Extensions\Ad\Http\Controllers\Back\AdController::class,
            'group' =>  Guysolamour\Administrable\Extensions\Ad\Http\Controllers\Back\GroupController::class,
        ],
    ],
    'forms' => [
        'back' => [
            'ad'    => Guysolamour\Administrable\Extensions\Ad\Forms\Back\AdForm::class,
            'group' => Guysolamour\Administrable\Extensions\Ad\Forms\Back\GroupForm::class,
        ],
    ],
];
