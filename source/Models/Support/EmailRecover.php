<?php


namespace Source\Models\Support;

use PHPMailer\PHPMailer\PHPMailer;
use stdClass;
use Exception;

class EmailRecover {
    /** @var PHPMailer */
    private $mail;

    /**@var stdClass */
    private $data;

    /**@var Exception */
    private $error;

    public function __construct() {
        $this->mail = new PHPMailer(true);
        $this->data = new stdClass();

        $this->mail->isSMTP();
        $this->mail->isHTML(true);
        $this->mail->setLanguage("br");

        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->CharSet = "utf-8";

        $this->mail->Host = MAIL_RECOVER["host"];
        $this->mail->Port = MAIL_RECOVER["port"];
        $this->mail->Username = MAIL_RECOVER["user"];
        $this->mail->Password = MAIL_RECOVER["passwd"];
    }

    public function add(string $subject, string $body, string $toName, string $toAddress): EmailRecover {
        $this->data->subject = $subject;
        $this->data->body = $body;
        $this->data->toName = $toName;
        $this->data->toAddress = $toAddress;

        return $this;

    }

    public function attach(string $filePath, string $fileName):EmailRecover{
        $this->data->attach[$filePath] = $fileName;

        return $this;
    }


    public function send():bool {
        try {
            $this->mail->msgHTML(true);
            $this->mail->Subject = $this->data->subject;
            $this->mail->Body = $this->data->body;
            $this->mail->addAddress($this->data->toAddress,$this->data->toName);
            $this->mail->setFrom(MAIL_RECOVER["from_email"], MAIL_RECOVER["from_name"]);

            if (!empty($this->data->attach)){
                foreach ($this->data->attach as $path => $name){
                    $this->mail->addAttachment($path,$name);
                }
            }
            $this->mail->send();
            return true;
        } catch (Exception $exception) {
            $this->error = $exception;
            return false;
        }

    }

    public function error(): ?Exception {
        return $this->error;
    }

}
