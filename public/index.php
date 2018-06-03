<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

\SashaMart\TestAutorization\Router::getPage(trim($_SERVER['REQUEST_URI']));