<?php

namespace OliviaRouterMail\Models;

use OliviaDatabaseModel\Model;

class MailDestinatario extends Model
{
    protected $table = 'olivia_destinatario_mail';
    protected $drive = 'mysql';

    protected $fillable = [
        'id_mail', 'email'
    ];

    protected $atributos = [
        'id', 'id_mail', 'email', 'created_at'
    ];
}
