<?php

namespace OliviaRouteMail;

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

ini_set('memory_limit', '-1');
ini_set('session.cache_expire', 60); // tempo de sessão aberta 60 minutos.
ini_set('session.cookie_httponly', true);
ini_set('session.cookie_secure', true);

session_start();
setlocale(LC_MONETARY, 'pt_BR');

use OliviaRouterMail\Classes\ClassMail;

require_once  __DIR__ . '/vendor/autoload.php';

class Index
{
    public function __construct()
    {
        $mail = new ClassMail();
        //$mail->novo_email('36107b6c-9f3d-4e72-ba4e-c39177479420', 'Assunto teste', 'Conteúdo teste');
        $mail->listar_fila();
    }
}
new Index();
