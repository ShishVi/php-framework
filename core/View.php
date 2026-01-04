<?php

namespace SimpleFramework;

class View
{
    public string $layout;
    public string $content = '';

    public function __construct($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $data=[], $layout = ''):string
    {
        extract($data);
        $view_file = VIEWS ."/{$view}.php";

        if(is_file($view_file)){
            ob_start();
            require $view_file;
            $this->content = ob_get_clean();

        }else{
            abort("Not view for page {$view_file}", 404);
        }
        if(false === $layout)
        {
            return $this->content;
        }

        $layout_name_file = $layout ?: $this->layout;
        $layout_file = VIEWS. "/layouts/{$layout_name_file}.php";

        if(is_file($layout_file)){
            require_once $layout_file;
        }else{
            abort("Not found layout {$layout_file}", 500);
        }
        return'';
    }
}