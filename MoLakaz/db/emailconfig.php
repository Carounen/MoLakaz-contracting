
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor\autoload.php';
function sendEmail()
{
    $mail = new PHPMailer(TRUE);

    try {
        $mail->setFrom('jinsama16@gmail.com', 'War');
        $mail->addAddress($_POST["txtemail"], 'Username');

        $mail->Subject = 'Welcome to MoLakaz';
        $mail->isHTML(TRUE);
        $mail->Body = '<html>Your account has been activated, you may now join the MoLakaz. Click on the link to <strong><a href="http://localhost/MoLakaz/login.php">login</a></strong>.</html>';
        $mail->AltBody = 'In case the HTML does not work.';

        $fn = $_FILES['profilepic']['name'];
        $mail->addAttachment("upload" . DIRECTORY_SEPARATOR. $fn);

        // SMTP parameters
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'jinsama16@gmail.com';
        $mail->Password = 'hafzmwvtzsfaxljv';
        $mail->Port = 587;

        // Add the following SMTP options
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );

        $retval = $mail->send();
        if ($retval == true) {
            $_SESSION['successmsg'] = "Registration successful, please check your email...";
        } else {
            $_SESSION['errormsg'] = "Email could not be sent...";
        }
    } catch (Exception $e) {
        echo $e->errorMessage();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}


function sendPayEmail()
{
    $mail = new PHPMailer(TRUE);

    try {
        $mail->setFrom('jinsama16@gmail.com', 'war');
        $mail->addAddress($_POST['email'], 'Username');
        $quo = $_POST['txtamount'];
        $user = $_POST['firstname'];

        $mail->Subject = 'Payment successful!';
        $mail->isHTML(TRUE);
        $mail->Body = '<html>Hello <p> ' . $user . '</p> Your payment of <p>amount: ' . $quo . '</p> has been carried out successfully! Our contractor will contact you soon!! 
        <strong><a href="http://localhost/molakaz/client/">Molakaz</a></strong>.</html>';
        $mail->AltBody = 'In case the HTML does not work.';
        // SMTP parameters
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'jinsama16@gmail.com';
        $mail->Password = 'hafzmwvtzsfaxljv';
        $mail->Port = 587;

        // Add the following SMTP options
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );

        $retval = $mail->send();
        if ($retval == true) {
            $_SESSION['successmsg'] = "Payment successful";
        } else {
            $_SESSION['errormsg'] = "Email could not be sent";
        }
    } catch (Exception $e) {
        echo $e->errorMessage();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}


function sendcEmail()
{
    $mail = new PHPMailer(TRUE);

    try {
        $mail->setFrom('jinsama16@gmail.com', 'War');
        $mail->addAddress($_POST["txtcemail"], 'Username');

        $mail->Subject = 'Welcome to MoLakaz';
        $mail->isHTML(TRUE);
        $mail->Body = '<html>Your account has been activated, you may now join the MoLakaz. Click on the link to <strong><a href="http://localhost/MoLakaz/logincontrac.php">login</a></strong>.</html>';
        $mail->AltBody = 'In case the HTML does not work.';

        $fn = $_FILES['profilepic']['name'];
        $mail->addAttachment("upload" . DIRECTORY_SEPARATOR. $fn);

        // SMTP parameters
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'jinsama16@gmail.com';
        $mail->Password = 'hafzmwvtzsfaxljv';
        $mail->Port = 587;

        // Add the following SMTP options
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );

        $retval = $mail->send();
        if ($retval == true) {
            $_SESSION['successmsg'] = "Registration successful, please check your email...";
        } else {
            $_SESSION['errormsg'] = "Email could not be sent...";
        }
    } catch (Exception $e) {
        echo $e->errorMessage();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}


function sendoEmail()
{
    $mail = new PHPMailer(TRUE);

    try {
        $mail->setFrom('jinsama16@gmail.com', 'War');
        $mail->addAddress($_POST["txtemail"], 'Username');

        $mail->Subject = 'Welcome to MoLakaz';
        $mail->isHTML(TRUE);
        $mail->Body = '<html>Your account has been activated, you may now join the MoLakaz. Click on the link to <strong><a href="http://localhost/MoLakaz/logincontrac.php">login</a></strong>.</html>';
        $mail->AltBody = 'In case the HTML does not work.';

     


        // SMTP parameters
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'jinsama16@gmail.com';
        $mail->Password = 'hafzmwvtzsfaxljv';
        $mail->Port = 587;

        // Add the following SMTP options
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );

        $retval = $mail->send();
        if ($retval == true) {
            $_SESSION['successmsg'] = "Registration successful, please check your email...";
        } else {
            $_SESSION['errormsg'] = "Email could not be sent...";
        }
    } catch (Exception $e) {
        echo $e->errorMessage();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}