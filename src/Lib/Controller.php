<?php

namespace Loteria\Lib;

use \Klein\{Request, Response};

class Controller
{
    public Request $request;
    public Response $response;
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function onError($codeHttp, \Throwable $th, string $view = 'error-exception', $data = [], string $template = 'base')
    {
        $data['th'] = $th;
        View::render($this->response,$view, $data, $template)->code($codeHttp)->send();
        exit;
    }

    public function view(string $view, $data = [], string $template = 'base'): Response
    {
        return View::render($this->response,$view, $data, $template);
    }
}
