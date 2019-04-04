<?php

require __DIR__ . '/vendor/autoload.php';

$app = new Slim\App;

$container = $app->getContainer();

$container['view'] = function ($container) {
    $templates = __DIR__ . '/templates/';
    $cache = __DIR__ . '/tmp/views/';

    $view = new Slim\Views\Twig($templates, compact('cache'));

    return $view;
};  

$app->get('/', function ($request, $response) {
    return $this->view->render($response, 'home.twig');
});

$app->run();