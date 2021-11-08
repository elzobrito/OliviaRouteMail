<?php

namespace OliviaRouterMail\Classes;

use OliviaRouterMailLib\CommandController;
use OliviaRouterMailLib\Email;
use OliviaRouterMail\Models\Mail;
use OliviaRouterMail\Models\MailDestinatario;
use OliviaRouterMail\Models\MailRemetente;
use OliviaRouterMail\Models\Sistema;

class ClassMail extends CommandController
{
    public function buscar_sistema($token)
    {
        $sistema = new Sistema();
        return $sistema->find(['olivia_sistema_mail.id, olivia_sistema_mail.nome, olivia_sistema_mail.token, olivia_sistema_mail.secret_key, olivia_sistema_mail.secret_iv, olivia_sistema_mail.status,'], ['token = ?'], [$token], 'INNER JOIN olivia_config_sistema_mail on olivia_config_sistema_mail.id_sistema_mail = olivia_sistema_mail.id');
    }

    public function novo_destinatario($id_mail, $destinarario)
    {
        $mail_destinatario = new MailDestinatario();
        return $mail_destinatario->save(['id_mail', 'email'], [$id_mail, $destinarario]);
    }

    public function novo_remetente($id_mail, $remetente)
    {
        $mail_remetente = new MailRemetente();
        return $mail_remetente->save(['id_mail', 'email'], [$id_mail, $remetente]);
    }

    public function novo_email($token_sistema, $assunto, $conteudo, $destinarario)
    {
        /**
         * @var object $parametros
         */
        $parametros['sistema_mail'] = $this->buscar_sistema($token_sistema);

        $mail = new Mail();
        $fields = ['id_sistema', 'assunto', 'conteudo'];
        $values[] = $parametros['sistema_mail'][0]->id;
        $values[] = $assunto;
        $values[] = $this->encryptIt($conteudo, $parametros['sistema_mail'][0]->secret_key, $parametros['sistema_mail'][0]->secret_iv);
        $id_mail = $mail->save($fields, $values);

        $this->novo_destinatario($id_mail, $destinarario);
        $this->novo_remetente($id_mail, $parametros['sistema_mail'][0]->username);
    }

    public function email_enviado($id_email)
    {
        $mail = new Mail();
        return $mail->update(['status'], ['id =?'], [1, $id_email]);
    }

    public function listar_fila()
    {
        $mails = new Mail();
        /**
         * @var object $parametros
         */
        $parametros['mails_nao_enviados'] = $mails->find([
            'olivia_mail.id',
            'olivia_mail.assunto',
            'olivia_mail.conteudo',
            'olivia_mail.status',

            'olivia_remetente_mail.email remetente',
            'olivia_destinatario_mail.email destinatario',

            'olivia_sistema_mail.id id_sys',
            'olivia_sistema_mail.nome',
            'olivia_sistema_mail.token',
            'olivia_sistema_mail.secret_key',
            'olivia_sistema_mail.secret_iv',
            'olivia_sistema_mail.status status_sys',

            'olivia_config_sistema_mail.port',
            'olivia_config_sistema_mail.host',
            'olivia_config_sistema_mail.username',
            'olivia_config_sistema_mail.password',
            'olivia_config_sistema_mail.fromName',
            'olivia_config_sistema_mail.charSet'
        ], ['olivia_mail.status = ?'], [0], 'INNER JOIN olivia_remetente_mail on olivia_remetente_mail.id_mail = olivia_mail.id INNER JOIN olivia_destinatario_mail on olivia_destinatario_mail.id_mail = olivia_mail.id INNER JOIN olivia_sistema_mail on olivia_sistema_mail.id = olivia_mail.id_sistema INNER JOIN olivia_config_sistema_mail on olivia_config_sistema_mail.id_sistema_mail = olivia_mail.id_sistema', null, null, null, '1');

        if ($parametros['mails_nao_enviados']) {
            $email = $parametros['mails_nao_enviados'][0];

            $mail = new Email($email->destinatario, $this->decryptIt($email->conteudo, $email->secret_key, $email->secret_iv), $email->assunto, $email->port, $email->host, $email->username, $this->decryptIt($email->password, $email->secret_key, $email->secret_iv), $email->fromName);
            $result = $mail->enviar();
            if ($result)
                $this->email_enviado($email->id);
        }
    }
}
