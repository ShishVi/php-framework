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

function session(): \SimpleFramework\Session
{
    return app()->session;
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

function redirect($url):void
{
    response()->redirect($url);
}

function get_alerts():void
{
    if(!empty($_SESSION['flash'])){
        foreach($_SESSION['flash'] as $key=>$value){
            echo view()->renderPartial("/inc/alert_{$key}", ["flash_{$key}" => session()->getFlash($key)]);
        }
    }
}

function get_errors($fieldName):string
{
    $output = '';
    $errors = $_SESSION['form_errors'] ?? [];
    if(isset($errors[$fieldName]))
    {
        $output .= '<div class="invalid-feedback d-block"><ul class="list-unstyled">';
        foreach($errors[$fieldName] as $error)
        {
            $output .= "<li>$error</li>";
        }
        $output .= '</ul></div>';
    }
    return $output;
}

function get_validation_class($filedName):string
{
    $errors = $_SESSION['form_errors'] ?? [];

    if(empty($errors)) return "";

    return isset($errors[$filedName]) ? "is-invalid" : "is-valid";
}

function old($fieldName):string
{
    $output = '';
    $data = $_SESSION['form_data'] ?? [];
    if(isset($data[$fieldName]))
    {
       $output = h($data[$fieldName]);
    }
    return $output;
}

function h($str):string
{
    return htmlspecialchars($str, ENT_QUOTES);
}