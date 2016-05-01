<?php

$app->get('/', App\Action\HomeAction::class)
    ->setName('home');

$app->get('/admin', App\Action\AdminAction::class)
    ->setName('admin');

$app->get('/usuarios', App\Action\UsuariosAction::class)
    ->setName('usuarios');
