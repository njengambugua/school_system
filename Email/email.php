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
                return true;
            } else {
                echo "Something is wrong: <br><br>" . $this->mail->ErrorInfo;
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }


    function sendHtml($address)
    {

        $page = file_get_contents($this->message);
        $subject = $this->subject;

        $replacements = array(
            '{{ STUDENT_NAME }}' => 'Vincent',
            '{{ STUDENT_REGNO }}' => 32843,
            '{{ STUDENT_REG_MD5 }}'=> md5(32843)
        );

        $content = str_replace(array_keys($replacements), array_values($replacements), $page);
        $this->mail->addAddress($address);
        $this->mail->Subject = $subject;
        $this->mail->Body = $content;
        if ($this->mail->send()) {
            return true;
        } else {
            echo "page not sent: <br><br>" . $this->mail->ErrorInfo;
            return false;
        }
    }
}




$email = new Email('../sendEmail/failed.php', 'WiseDigits Academy Enrollment');
$email->sendHtml('ndegwavincent7@gmail.com');
