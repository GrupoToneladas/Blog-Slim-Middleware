<?php

namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\UserLoginModel;

class AcessoLoginAction
{
    private $model;

    public function __construct(UserLoginModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $dados = $request->getParsedBody();

        $this->model->checkLogin($dados['usuario'], $dados['senha']);

        return $response->withStatus(302)->withHeader('Location', '/');
    }
}
