<?php

declare(strict_types=1);

namespace ER\SamplER\Api;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ApiController {
    public function __construct()
    {
    }

    public function me(Request $request, Response $response, $args) {
        $qp = $request->getQueryParams();
        $name = $qp['name'] ?? 'Gabe';
        // if (!isset($qp['name'])) {
        //     $name = 'Gabe';
        // } else {
        //     $name = $qp['name'];
        // }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode(['name' => $name]));

        return $response;
    }
}
