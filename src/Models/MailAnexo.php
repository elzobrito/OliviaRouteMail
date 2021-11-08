<?php

namespace OliviaRouterMail\Models;

use OliviaDatabaseModel\Model;

class MailAttachment extends Model
{
    protected $table = 'olivia_anexo_mail';
    protected $drive = 'mysql';

    protected $fillable = [
        'id_mail', 'anexo', 'src'
    ];

    protected $atributos = [
        'id', 'id_mail', 'anexo', 'src', 'created_at'
    ];
}
