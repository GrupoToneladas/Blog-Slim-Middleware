<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Admin
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $response = $next($request, $response);

        if (!isset($_SESSION['logado']) || !(in_array('admin', $_SESSION['acessos']))) {
            $response = $response->withStatus(302)->withHeader('Location', '/');
        }

        return $response;
    }
}
