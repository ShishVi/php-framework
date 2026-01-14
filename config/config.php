<?php

define("ROOT", dirname(__DIR__));

const WWW = ROOT ."/public";
const CONFIG = ROOT . '/config';
const HELPERS = ROOT . '/helpers';

const APP = ROOT. '/app';

const CORE = ROOT . '/core';

const VIEWS = APP . '/Views';

const LAYOUT = 'default';
const PATH = "https://framework-custom";

const DB_CONFIG = [
    'driver' => 'mysql',
    'host' => 'MySQL-8.0',
    'database' => 'custom_framework',
    'username' => 'cs_fr',
    'password' => '15152615',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'port' => 3306,
    'prefix' => '',
];