<?php


namespace Source\Models\Support;

use PHPMailer\PHPMailer\PHPMailer;
use Exception;
use Rain\Tpl;

class EmailRecover {
    /** @var PHPMailer */
    private $mail;

    /**@var Exception */
    private $error;

    public function __construct() {

        $this->mail = new PHPMailer(true);

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


    public function send($toAddress, $toName, $subject, $tplName, $data = array()) {

        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/theme/email/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"         => false
        );

        Tpl::configure( $config );

        $tpl = new Tpl;

        foreach ($data as $key => $value) {
            $tpl->assign($key, $value);
        }

        $html = $tpl->draw($tplName, true);

        try {
            $this->mail->msgHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $html;
            $this->mail->addAddress($toAddress,$toName);
            $this->mail->setFrom(MAIL_RECOVER["from_email"],MAIL_RECOVER["from_name"]);

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