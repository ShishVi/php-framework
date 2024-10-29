<?php

function app() : coreFramework\Application
{
    return coreFramework\Application::$app;
}

function request() : coreFramework\Request
{
    return app()->request;
}


?>