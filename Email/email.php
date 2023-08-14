<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;

require('../vendor/autoload.php');

class Email
{
    public $mail;
    public $message;
    public $subject;


    public function __construct($message, $subject)

    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'ndegwavincent7@gmail.com';
        $this->mail->Password = 'feulzpogdvsvnidj';
        $this->mail->Port = 587;
        $this->mail->SMTPSecure = "tls";

        $this->mail->isHTML(true);
        $this->mail->setFrom('ndegwavincent7@gmail.com', 'WiseDigits Academy');
        $this->message = $message;
        $this->subject = $subject;
    }


    public function sendMany($addresses)
    {
        try {
            $subject = $this->subject;
            $body = $this->message;

            foreach ($addresses as $address) {
                $this->mail->addAddress($address);
            }

            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            if ($this->mail->send()) {
                echo "Bulk Email is sent! <br><br>";
            } else {
                echo "Something is wrong: <br><br>" . $this->mail->ErrorInfo;
            }
        } catch (\Throwable $th) {
            echo "failed to send";
        }
    }


    public function send($address)
    {
        try {

            $subject = $this->subject;
            $body = $this->message;


            $this->mail->addAddress($address);

            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            if ($this->mail->send()) {
                echo "Email sent <br><br>";
            } else {
                echo "Something is wrong: <br><br>" . $this->mail->ErrorInfo;
            }
        } catch (\Throwable $th) {
            echo "failed to send";
        }
    }
}


$recipients = ['ndegwavincent7@gmail.com', 'vincentndungu393@gmail.com'];
$email = new Email('Hello', 'Attendance');
// $email->sendMany($recipients);
$email->send('john898mbugua@gmail.com');
