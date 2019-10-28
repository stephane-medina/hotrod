<?php
//applications/config/email.php

//$config['protocol']     = 'smtp';
//$config['smtp_host']    = 'mail.smtp_host.com';
$config['smtp_port']    = '8025'; // 465, 587 and 25 can also be used. Use Port 465 for SSL.
$config['smtp_crypto']  = 'ssl';
$config['smtp_user']    = 'root';
$config['smtp_pass']    = '';
$config['charset']      = 'utf-8';
$config['mailtype']     = 'html';
$config['newline']      = "\r\n";