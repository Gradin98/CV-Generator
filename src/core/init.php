<?php

$container = $app->getContainer();
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['database']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function () use ($capsule){
    return $capsule;
};

$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

$container['v'] = function () {
    return new \Violin\Violin;
};

$container['staticMethods'] = function ($c) {
    return new \App\Helpers\StaticMethods($c);
};

$container['databaseBuilder'] = function ($c) {
    return new \App\Helpers\DatabaseBuilder($c);
};

$container['view'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    $view = new \Slim\Views\Twig($settings['template_path']);
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $basePath));
    $view->getEnvironment()->addGlobal('url', $c['request']->getUri()->getBaseUrl());
    $view->getEnvironment()->addGlobal('flash', $c['flash']);
    $view->getEnvironment()->addGlobal('staticMethods', $c['staticMethods']);
    return $view;
};