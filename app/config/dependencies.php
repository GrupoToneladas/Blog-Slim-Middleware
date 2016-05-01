<?php

$container = $app->getContainer();

$container['view'] = function ($container) {
    $settings = $container->get('settings')['view'];
    $view = new \Slim\Views\Twig($settings['template_path'], [
        'cache' => $settings['cache_path']
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    $env = $view->getEnvironment();
    $env->addGlobal('session', $_SESSION);

    return $view;
};

# Actions
$container[App\Action\HomeAction::class] = function ($container) {
    return new App\Action\HomeAction($container->get('view'));
};

$container[App\Action\AdminAction::class] = function ($container) {
    return new App\Action\AdminAction($container->get('view'));
};

$container[App\Action\UsuariosAction::class] = function ($container) {
    return new App\Action\UsuariosAction($container->get('view'));
};

$container[App\Action\AcessoLoginAction::class] = function ($container) {
    return new App\Action\AcessoLoginAction($container->get('Model\UserLogin'));
};

# Model
$container['Model\UserLogin'] = function ($container) {
    return new App\Model\UserLoginModel();
};

#Middleware
$container[App\Middleware\Admin::class] = function () {
    return new App\Middleware\Admin();
};

$container[App\Middleware\Usuarios::class] = function () {
    return new App\Middleware\Usuarios();
};
