<?php

namespace App\Model;

class UserLoginModel
{
    public function checkLogin($usuario, $senha)
    {
        if ($usuario == 'admin' && $senha == 'admin') {
            $_SESSION = [
                'logado' => true,
                'acessos' => [
                    'admin',
                    'usuarios',
                ]
            ];
        } elseif ($usuario == 'usuarios' && $senha == 'usuarios') {
            $_SESSION = [
                'logado' => true,
                'acessos' => [
                    'usuarios'
                ]
            ];
        }

        return true;
    }
}
