<?php

namespace OliviaLib;

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

ini_set('memory_limit', '-1');
ini_set('session.cache_expire', 60); // tempo de sessão aberta 60 minutos.
ini_set('session.cookie_httponly', true);
ini_set('session.cookie_secure', true);

session_start();
setlocale(LC_MONETARY, 'pt_BR');

class Config
{
    public function __construct()
    {
        $_SESSION['e404'] = false;
        $_SESSION['CSRF'] = true;
        $_SESSION['App_folder'] = 'OliviaApp';
        $_SESSION['Middleware_folder'] = 'Middleware';
        $_SESSION['Controller_folder'] = 'Controller';
        $_SESSION['BASENAME'] = explode('/', $_SERVER["REQUEST_URI"])[1];
    }
}
