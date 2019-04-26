<?php
/**
 * Created by PhpStorm.
 * User: maiwenn
 * Date: 25/04/2019
 * Time: 10:58
 */

namespace App\Contact;


class PhpMailForm
{

    public $to = false;
    public $from_name = false;
    public $from_email = false;
    public $subject = false;
    public $mailer = false;
    public $message = '';
    public $reply_to = '';

    public $content_type = 'text/html';
    public $charset = 'UTF-8';
    public $ajax = false;

    public $error_msg = array(
        'invalid_to_email' => 'Temporairement indisponible',
        'invalid_from_name' => 'Merci de renseigner votre Nom',
        'invalid_from_email' => 'Merci de renseigner un e-mail valide',
        'invalid_subject' => 'Veuillez choisir un sujet',
        'invalid_mailer' => 'Mailer Email is empty or invalid!',
        'short' => 'Le nombre de caractère est insufisant',
        'send_error' => 'Temporairement indisponible',
        'ajax_error' => 'Désolé nous avons un soucis côté serveur',
    );

    private $error = false;

    public function __construct() {
        $this->mailer = "formsubmit@" . @preg_replace('/^www\./','', $_SERVER['SERVER_NAME']);
    }

    public function add_message($content, $label = '', $length_check = false) {
        $message = filter_var($content, FILTER_SANITIZE_STRING) . '<br>';
        if( $length_check ) {
            if( strlen($message) < $length_check + 4 ) {
                $this->error .=  $label . ' ' . $this->error_msg['short'] . '<br>';
                return;
            }
        }
        $this->message .= !empty( $label ) ? '<strong>' . $label . ':</strong> ' . $message : $message;
    }

    public function send() {
        if( $this->ajax ) {
            if( !isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
                return $this->error_msg['ajax_error'];
            }
        }

        $to = filter_var( $this->to, FILTER_VALIDATE_EMAIL);
        $from_name = filter_var( $this->from_name, FILTER_SANITIZE_STRING);
        $from_email = filter_var( $this->from_email, FILTER_VALIDATE_EMAIL);
        $subject = filter_var( $this->subject, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $mailer = filter_var( $this->mailer, FILTER_VALIDATE_EMAIL);
        $message = nl2br($this->message);

        if( ! $to || $to === 'contact@example.com') $this->error .= $this->error_msg['invalid_to_email'] . '<br>';
        if( ! $from_name ) $this->error .= $this->error_msg['invalid_from_name'] . '<br>';
        if( ! $from_email ) $this->error .= $this->error_msg['invalid_from_email'] . '<br>';
        if( ! $subject ) $this->error .= $this->error_msg['invalid_subject'] . '<br>';
        if( ! $mailer) $this->error .= $this->error_msg['invalid_mailer'] . '<br>';

        if( $this->error ) {
            return $this->error;
        }

        $headers = 'From: ' . $from_name . ' <' . $mailer . '>' . PHP_EOL;
        $headers .= 'Reply-To: ' . $this->reply_to . PHP_EOL;
        $headers .= 'MIME-Version: 1.0' . PHP_EOL;
        $headers .= 'Content-Type: ' . $this->content_type . '; charset=' . $this->charset . PHP_EOL;
        $headers .= 'X-Mailer: PHP/' . phpversion() . ' with PHP_Mail_Form';

        $sendemail = mail($to, $subject, $message, $headers);

        if( $sendemail ) {
            header("Location: /Contact/index.html.twig",TRUE,302);
        } else {
            return $this->error_msg['send_error'];
        }
    }

}