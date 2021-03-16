<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class PHPMailer_Lib
{
    public function __construct(){
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){
        // Include PHPMailer library files
        require APPPATH.'libraries/phpmailer/src/Exception.php';
            require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
            require APPPATH.'libraries/phpmailer/src/SMTP.php';
        
        $mail = new PHPMailer;
        return $mail;
    }
}

?>