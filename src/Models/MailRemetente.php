<?php

namespace OliviaRouterMail\Models;

use OliviaDatabaseModel\Model;

class MailRemetente extends Model
{
    protected $table = 'olivia_remetente_mail';
    protected $drive = 'mysql';

    protected $fillable = [
        'id_mail', 'email'
    ];

    protected $atributos = [
        'id', 'id_mail', 'email', 'created_at'
    ];
}
