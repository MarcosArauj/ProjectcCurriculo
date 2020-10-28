<?php


namespace Source\Models\Support;

use PHPMailer\PHPMailer\PHPMailer;
use Exception;
use Rain\Tpl;

class EmailSupport {
    /** @var PHPMailer */
    private $mail;

    /**@var Exception */
    private $error;

    public function __construct() {

        $this->mail = new PHPMailer(true);

      //  $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->isHTML(true);
        $this->mail->setLanguage("pt_br");

        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->CharSet = PHPMailer::CHARSET_UTF8;

        $this->mail->Host = MAIL_SUPPORT["host"];
        $this->mail->Port = MAIL_SUPPORT["port"];
        $this->mail->Username = MAIL_SUPPORT["user"];
        $this->mail->Password = MAIL_SUPPORT["passwd"];
    }


    public function send($toAddress, $toName, $subject, $tplName, $data = array()):bool {

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
            $this->mail->setFrom(MAIL_SUPPORT["from_email"],MAIL_SUPPORT["from_name"]);

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