<?php 
     $routeMiddleware = [
        // outros middlewares padrão do Laravel...
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'candidato' => \App\Http\Middleware\CandidatoMiddleware::class,
    ];
