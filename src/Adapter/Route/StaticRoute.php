<?php

namespace Fluxlabs\FluxScormPlayerApi\Adapter\Route;

use Fluxlabs\FluxRestApi\Request\RequestDto;
use Fluxlabs\FluxRestApi\Response\ResponseDto;
use Fluxlabs\FluxRestApi\Route\Route;
use Fluxlabs\FluxScormPlayerApi\Adapter\Api\Api;

class StaticRoute implements Route
{

    private Api $api;


    public static function new(Api $api) : static
    {
        $route = new static();

        $route->api = $api;

        return $route;
    }


    public function getBodyType() : ?string
    {
        return null;
    }


    public function getMethod() : string
    {
        return "GET";
    }


    public function getRoute() : string
    {
        return "/static/{path.}";
    }


    public function handle(RequestDto $request) : ResponseDto
    {
        $path = $this->api->getStaticPath(
            $request->getParams()["path"]
        );

        if ($path !== null) {
            return ResponseDto::new(
                null,
                null,
                null,
                null,
                $path
            );
        } else {
            return ResponseDto::new(
                null,
                404
            );
        }
    }
}