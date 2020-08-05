<?php

declare(strict_types=1);

namespace ER\SamplER\FrontEnd;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;

class FrontendController {
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function hello($request, Response $response, $args) {
        return $this->container->get('view')->render($response, 'hello.html', [
            'name' => $args['name']
        ]);
    }
}
