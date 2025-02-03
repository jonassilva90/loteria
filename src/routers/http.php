<?php
use \Klein\Klein;
use \Klein\{Request, Response};
use Loteria\Lib\Auth;
use Loteria\Lib\AuthException;
use Loteria\Lib\View;
use Loteria\Controller\BilhetesController;
use Loteria\Controller\LoginController;
$klein = new Klein();

if(Auth::isLogged()) {
    $klein->respond('GET', "/", function(Request $request,Response $response) {
        return View::render($response, 'index')->send();
    });
} else {
    $klein->respond('GET', "/", function(Request $request,Response $response) {
        return $response->redirect('/login');
    });
}

$klein->respond('POST', "/api/gerar-bilhetes", function(Request $request, Response $response) {
    return (new BilhetesController($request, $response))->gerarBilhetes()->send();
});

$klein->respond('GET', "/login", function(Request $request, Response $response) {
    return View::render($response, 'login')->send();
});
$klein->respond('POST', "/login", function(Request $request, Response $response) {
    return (new LoginController($request, $response))->login()->send();
});

$klein->respond('GET', "/logout", function(Request $request, Response $response) {
    session_destroy();
    return $response->redirect('/login');
});

$klein->onHttpError(function ($code, $klein, $matched, $methods_matched, $http_exception) {
    return View::render(new Response(), 'error-exception', ['th' => new Exception("Conteúdo não encontrado")])
        ->code(404)
        ->send();
});

try {
    $klein->dispatch();
} catch (\Throwable $th) {
    // \viewException($th);
}