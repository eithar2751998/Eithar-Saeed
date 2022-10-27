<?php
namespace App\Mail\Contract;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

abstract class Mail {
    private string $mailHost = 'smtp.mailtrap.io';
    private string $mailUserName = 'aa1529d6d152e1';
    private string $mailPassword = 'f00c5f69333a2f';
    private int $mailPort = 587;
    private string $mailEncryption = 'tls';
    protected PHPMailer $mail;
    protected $mailTo,$subject,$body;
    public function __construct($mailTo,$subject,$body) {
        // setters
        $this->mailTo = $mailTo;
        $this->subject = $subject;
        $this->body = $body;

        $this->mail = new PHPMailer(true);
         //Server settings
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = $this->mailHost;                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = $this->mailUserName;                     //SMTP username
        $this->mail->Password   = $this->mailPassword;                               //SMTP password
        $this->mail->SMTPSecure = $this->mailEncryption;            //Enable implicit TLS encryption
        $this->mail->Port       = $this->mailPort;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    }
    public abstract function send() :bool;
}