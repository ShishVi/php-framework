<?php

function app(): \SimpleFramework\Application
{
    return new \SimpleFramework\Application::$app;
}

function request(): \SimpleFramework\Request
{
    return app()->request;
}

function response(): \SimpleFramework\Response
{
    return app()->response;
}

function view($view='', $data=[], $layout = ''):string|\SimpleFramework\View
{
    if($view)
    {
        return app()->view->render($view, $data, $layout);
    }
    return app()->view;
}

function abort($error = '', $code = 404)
{
    response()->setResponseCode($code);
    echo view("errors/{$code}", ['error' => $error], LAYOUT);
    die();
}

function base_url($path=''):string
{
    return PATH. $path;
}