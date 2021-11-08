<?php

namespace OliviaRouterMail\Models;

use OliviaDatabaseModel\Model;

class Sistema extends Model
{
    protected $table = 'olivia_sistema_mail';
    protected $drive = 'mysql';

    protected $fillable = [
        'nome', 'token', 'secret_key', 'secret_iv'
    ];

    protected $atributos = [
        'id', 'nome', 'token', 'secret_key', 'secret_iv', 'status', 'created_at'
    ];
}
