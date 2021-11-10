<?php

require "vendor/autoload.php";

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;

$app = AppFactory::create();
//$app->setBasePath("/FProject/BackSlim");
$app->get("/",function(ServerRequestInterface $request,
    ResponseInterface $response){
        $response->getBody()->write("k cs");
        return $response;
    });
$app->get("/maidatum",function(ServerRequestInterface $request,
    ResponseInterface $response){
        $datum = new DateTime();
        $response->getBody()->write($datum->format("y-m-d"));
        $response->getBody()->write($datum->format(DateTime::ISO8601));
        return $response;
    });
$app->get("/lista",function(ServerRequestInterface $request,
    ResponseInterface $response){
        $response->getBody()->write('
            <!DOCTYPE html>
            <html lang="hu">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Lista</title>
            </head>
            <body>
            <ul>
                <li>
                    k
                </li>
                <li>
                    cs
                </li>
            </ul>
            </body>
            </html>');
        return $response;
    });
$app->get("/api/lista",function(ServerRequestInterface $request,
    ResponseInterface $response){
        $userek = ['k','cs'];
        $ki = json_encode($userek);
        $response->getBody()->write($ki);
        return $response->withAddedHeader("Content-Type", "application/json");
    });
$app->get("/api/{id}",function(ServerRequestInterface $request,
    ResponseInterface $response, array $args){
        $id = $args["id"];
        $userek = ['k','cs'];
        $ki = json_encode(["user"=>$userek[$id]]);
        $response->getBody()->write($ki);
        return $response->withAddedHeader("Content-Type", "application/json");
    });
$app->run();