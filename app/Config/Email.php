<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail  = 'emailkamu@gmail.com';
    public $fromName   = 'Layanan Informasi Data BWS Sumatera V';

    public $SMTPHost   = 'smtp.gmail.com';
    public $SMTPUser   = 'emailkamu@gmail.com'; 
    public $SMTPPass   = 'password_app_email';   
    public $SMTPPort   = 587; 
    public $SMTPCrypto = 'tls';

    public $protocol   = 'smtp';
    public $mailType   = 'html';
    public $charset    = 'utf-8';
    public $newline    = "\r\n";
}
