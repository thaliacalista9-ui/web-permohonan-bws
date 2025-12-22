<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail = 'permohonandatabwssumaterav@gmail.com';
    public $fromName  = 'Layanan Informasi Data BWS Sumatera V';

    public $protocol  = 'smtp';
    public $SMTPHost  = 'smtp.gmail.com';
    public $SMTPUser  = 'permohonandatabwssumaterav@gmail.com';
    public $SMTPPass  = 'yddu jxie wzff ggmb';
    public $SMTPPort  = 587;
    public $SMTPCrypto = 'tls';

    public $mailType  = 'html';
    public $charset   = 'utf-8';
    public $wordWrap  = true;

    public $CRLF      = "\r\n";
    public $newline   = "\r\n";

    public $SMTPTimeout = 60;
    public $validate    = true;
}
