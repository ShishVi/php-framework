<?php

function app(): \SimpleFramework\Application
{
    return new \SimpleFramework\Application::$app;
}

function request(): \SimpleFramework\Request
{
    return app()->request;
}