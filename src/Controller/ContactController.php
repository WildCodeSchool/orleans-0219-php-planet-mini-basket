<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Contact\PhpMailForm;


class ContactController extends AbstractController
{

    public function index()
    {

        $contactform = new PHPMailForm;
        $contactform->ajax = false;


        $contactform->to = 'maiwenngay99@gmail.com';
        $contactform->from_name = $_POST['name'];
        $contactform->from_email = 'maiwenn99@icloud.com';
        $contactform->subject = $_POST['subject'];
        $contactform->reply_to = $_POST['email'];

        $contactform->add_message( $_POST['name'], 'From');
        $contactform->add_message( $_POST['email'], 'Email');
        $contactform->add_message( $_POST['message'], 'Message', 10);

        echo $contactform->send();
/*        $contactManager = new ContactManager();
        $contacts = $contactManager -> selectAll();
        $messageSent = false;
        $errors = array();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataClean = new DataClean();
            $data = $dataClean->cleanData($_POST);
            $userEmail = $data['email'];
            $subject = $data['select_form'];
            if (empty($data['name'])) {
                $errors['name'] = '* Le champs nom est obligatoire';
            } else {
                $authorizedLengthName = 25;
                if (strlen($data['name']) > $authorizedLengthName) {
                    $errors['name'] = '* Le champs nom ne doit pas être supérieur à ' . $authorizedLengthName;
                }
            }
            if (empty($data['message'])) {
                $errors['message'] = '* Le champs message est obligatoire';
            } else {
                $authorizedLengthMessage = 800;
                if (strlen($data['message']) > $authorizedLengthMessage) {
                    $errors['message'] = '* Le champs message ne doit pas être supérieur à ' . $authorizedLengthMessage;
                }
            }
            if (empty($data['telephone'])) {
                $errors['telephone'] = '* Le champs téléphone est obligatoire';
            } else {
                if (!is_numeric($data['telephone'])) {
                    $errors['telephone'] = "* Le champs téléphone accepte seulement des chiffres";
                }
            }
            (empty($data['email'])) ? $errors['email'] = 'Le champs email est obligatoire'
                : filter_var(filter_var($data['email'], FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
            if (empty($data['civility'])) {
                $errors['civility'] = '* Le champs civilité est obligatoire';
            }
            if (empty($data['select_form'])) {
                $errors['select_form'] = '* Le champs objet est obligatoire';
            }
            $transport = (new \Swift_SmtpTransport(
                APP_SWIFTMAILER_HOST,
                APP_SWIFTMAILER_PORT,
                APP_SWIFTMAILER_ENCRYPTION
            )
            )
                ->setUsername(APP_SWIFTMAILER_USERNAME)
                ->setPassword(APP_SWIFTMAILER_PASSWORD);
            $mailer = new \Swift_Mailer($transport);
            $message = (new \Swift_Message($subject))
                ->setFrom($userEmail)
                ->setTo([APP_SWIFTMAILER_USERNAME])
                ->setBody($this->twig->render('Item/_form.html.twig', ['data' => $data]), 'text/html');
            if (empty($errors)) {
                if ($mailer->send($message)) {
                    $messageSent = true;
                };
            }
        }
        return $this->twig->render('Contact/index.html.twig', ['errors' => $errors, 'categories' => $categories]);*/
    }
}