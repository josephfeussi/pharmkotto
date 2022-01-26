<?php

return [
    'document_name'  => 'Pharmacie Kotto Request Documentation',

    /*
    * Route where request docs will be served from
    * localhost:8080/request-docs
    */
    'url' => 'request-docs',
    'middlewares' => [
        //Example
        // \App\Http\Middleware\NotFoundWhenProduction::class,
    ],
    /**
     * Path to to static HTML if using command line.
     */
    'docs_path' => base_path('docs/request-docs/'),

    /**
     * Sorting route by and there is two types default(route methods), route_names.
     */
    //'sort_by' => 'default',
    'sort_by' => 'route_names',

    'hide_matching' => [
        "#^telescope#",
        "#^docs#",
        "#^request-docs#",
    ]
];
