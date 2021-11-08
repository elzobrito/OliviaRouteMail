<?php

namespace OliviaLib;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    private $email;
    private $mensagem;
    private $assunto;
    private $anexos;
    private $anexos2;
    private $port;
    private $host;
    private $username;
    private $password;
    private $fromName;

    function __construct($email, $mensagem, $assunto, $port, $host, $username, $password, $fromName, $anexos = null, $anexos2 = null)
    {
        $this->email = $email;
        $this->mensagem = $mensagem;
        $this->assunto = $assunto;
        $this->anexos = $anexos;
        $this->anexos2 = $anexos2;
        $this->port = $port; //Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.
        $this->host = $host; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
        $this->username = $username; //Informe o e-mai o completo
        $this->password = $password; //Senha da caixa postal
        $this->fromName = $fromName;
    }

    function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    function setAnexos($anexos)
    {
        $this->anexos = $anexos;
    }

    public function enviar()
    {
        try {
            if ($this->email != "") {
                $mailer = new PHPMailer();
                $mailer->IsSMTP();
                $mailer->SMTPDebug = 0;
                $mailer->SMTPAuth = true; // authentication enabled
                $mailer->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                $mailer->Port = $this->port; //Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.
                $mailer->Host = $this->host; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
                $mailer->SMTPAuth = true; //Define se haverá ou não autenticação no SMTP
                $mailer->Username = $this->username; //Informe o e-mai o completo
                $mailer->Password = $this->password; //Senha da caixa postal
                $mailer->FromName = '=?UTF-8?B?' . base64_encode($this->fromName) . '?='; //Nome que será exibido para o destinatário
                $mailer->From = $this->username; //Obrigatório ser a mesma caixa postal indicada em "username"
                $mailer->AddAddress($this->email); //Destinatários
                $mailer->Subject = '=?UTF-8?B?' . base64_encode($this->assunto) . '?=';
                $mailer->IsHTML(true); // Define que o e-mail será enviado como HTML
                $mailer->Body = $this->mensagem;
                $mailer->CharSet = "UTF-8";

                if (!$mailer->Send())
                    return false;

                return true;
            }
        } catch (Exception $erro) {
            return false;
        }
    }
}
