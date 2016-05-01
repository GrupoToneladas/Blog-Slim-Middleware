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
