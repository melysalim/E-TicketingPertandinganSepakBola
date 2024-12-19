<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail = 'etiketsleman@gmail.com'; // Ganti dengan email Anda
    public $fromName = 'E-Ticket Maguwoharjo';
    public $SMTPHost = 'smtp.gmail.com';
    public $SMTPUser = 'etiketsleman@gmail.com'; // Ganti dengan email Anda
    public $SMTPPass = 'etiket12345'; // Ganti dengan App Password Gmail Anda
    public $SMTPPort = 587; // Port untuk TLS
    public $SMTPCrypto = 'tls';
    public $mailType = 'html';
}
