<?php

namespace Loteria\Lib;

use \Klein\Response;

class View
{
    public static function render(Response $response,string $view, $data = [], string $template = 'base'): Response
    {
        $view = str_replace('.', '/', $view);
        $template = str_replace('.', '/', $template);
        extract($data);
        $filenameView     = PATH . "src/View/{$view}.php";
        $filenameTemplate = PATH . "src/View/Template/{$template}.php";

        try {
            $contentPrevious = ob_get_clean();
            if(file_exists($filenameView)) {
                require $filenameView;
            } else {
                require PATH . "src/View/error-view.php";
            }
            $contentView = ob_get_clean();
        } catch (\Throwable $th) {
            require PATH . "src/View/error-exception.php";
        }
        if(!file_exists($filenameTemplate)) {
            $filenameTemplate = PATH . "src/View/Template/base.php";
        }

        require $filenameTemplate;
        $content = ob_get_clean();
        return $response->body($content);
    }
}