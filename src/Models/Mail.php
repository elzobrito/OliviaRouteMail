<?php

namespace OliviaRouterMail\Models;

use OliviaDatabaseModel\Model;

class Mail extends Model
{
    protected $table = 'olivia_mail';
    protected $drive = 'mysql';

    protected $fillable = [
        'id_sistema', 'assunto', 'conteudo'
    ];

    protected $atributos = [
        'id', 'id_sistema', 'assunto', 'conteudo', 'status', 'created_at'
    ];
}
