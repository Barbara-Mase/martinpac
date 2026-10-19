<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mailer extends PHPMailer
{
    public function mail(): void
    {
        //Create a new PHPMailer instance
        $mail = new PHPMailer();

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        //SMTP::DEBUG_OFF = off (for production use)
        //SMTP::DEBUG_CLIENT = client messages
        //SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        //Set the hostname of the mail server
        $mail->Host = '127.0.0.1';
        //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
        //if your network does not support SMTP over IPv6,
        //though this may cause issues with TLS

        //Set the SMTP port number:
        // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
        // - 587 for SMTP+STARTTLS
        $mail->Port = 1025;

        //Set the encryption mechanism to use:
        // - SMTPS (implicit TLS on port 465) or
        // - STARTTLS (explicit TLS on port 587)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = false;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'Martinpac.contact@proton.me';

        $mail->Password = '';

        //Set who the message is to be sent from
        //Note that with gmail you can only use your account address (same as `Username`)
        //or predefined aliases that you have configured within your account.
        //Do not use user-submitted addresses in here
        $mail->setFrom('martinpac.contact@proton.me', 'MartinPAC contact');

        //Set who the message is to be sent to
        $mail->addAddress('barbara.mase@gmail.com', 'Barbara Mase');

        //Set an alternative reply-to address
        //This is a good place to put user-submitted addresses
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            //Put the submitter's address in a reply-to header
            //This will fail if the address provided is invalid,
            //in which case we should ignore the whole request
            if ($mail->addReplyTo($_POST['email'], $_POST['firstname'])) {
                $mail->Subject = 'PHPMailer contact form';
                //Keep it simple - don't use HTML
                $mail->isHTML(false);
                //Build a simple message body
                $mail->Body = <<<EOT
    Email: {$_POST['email']}
    Firstname: {$_POST['firstname']}
    Lastname: {$_POST['lastname']}
    Subject: {$_POST['subject']}
    Message: {$_POST['message']}
    Contact preference : {$_POST['contact-choice']}
    EOT;
                //Send the message, check for errors
                if (!$mail->send()) {
                    //The reason for failing to send will be in $mail->ErrorInfo
                    //but it's unsafe to display errors directly to users - process the error, log it on your server.
                    $msg = 'Sorry, something went wrong. Please try again later.';
                } else {
                    $msg = 'Message sent! Thanks for contacting us.';
                }
            } else {
                $msg = 'Invalid email address, message ignored.';
            }

        }
    }

}

