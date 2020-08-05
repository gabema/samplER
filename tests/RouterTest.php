<?php

declare(strict_types=1);

namespace ER\SamplER\Tests;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @see https://odan.github.io/2020/06/09/slim4-testing.html
 * @covers ..\src\Router.php
 * @covers \ER\SamplER\Api\ApiController
 * @covers \ER\SamplER\Frontend\FrontendController
 */
class RouterTest extends TestCase {
    use AppTestTrait;

    public function testAppHelloWithName() {
        $request = $this->createRequest('GET', '/app/hello/Bryan');
        $response = $this->app->handle($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    public function testAppHelloWithoutName() {
        $request = $this->createRequest('GET', '/app/hello');
        $response = $this->app->handle($request);

        $this->assertSame(404, $response->getStatusCode());
    }

    public function testApiMe() {
        $request = $this->createRequest('GET', '/api/me');
        $response = $this->app->handle($request);

        $this->assertSame(200, $response->getStatusCode());
        $this->assertJsonData($response, ['name' => 'Gabe']);
    }

    public function testApiMeWithOverride() {
        $request = $this->createRequest('GET', '/api/me?name=Josh');
        $response = $this->app->handle($request);

        $this->assertSame(200, $response->getStatusCode());
        $this->assertJsonData($response, ['name' => 'Josh']);
    }
}
