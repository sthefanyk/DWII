<?php
    ...
    // Nova Rota de Teste
    $app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("<h1>API-SLIM RUNNING!!<h1>");
    return $response;
    });
    // Executa Aplicação
    $app->run();
