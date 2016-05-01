<?php

$app->get('/', App\Action\HomeAction::class)
    ->setName('home');

$app->get('/admin', App\Action\AdminAction::class)
    ->setName('admin')
    ->add(App\Middleware\Admin::class);

$app->get('/usuarios', App\Action\UsuariosAction::class)
    ->setName('usuarios')
    ->add(App\Middleware\Usuarios::class);

$app->post('/logar', App\Action\AcessoLoginAction::class)
    ->setName('acesso/logar');

$app->get('/deslogar', function ($request, $response, $args) {
    session_destroy();

    return $response->withStatus(302)->withHeader('Location', '/');
});
