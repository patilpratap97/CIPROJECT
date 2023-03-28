<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter PHPMailer Class
 *
 * This class enables SMTP email with PHPMailer
 *
 * @category    Libraries
 * @author      CodexWorld
 * @link        https://www.codexworld.com
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
class PHPMailer_Lib
{
    public function __construct(){
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){
        // Include PHPMailer library files
        require_once APPPATH.'/PHPMailer/Exception.php';
        require_once APPPATH.'/PHPMailer/PHPMailer.php';
        require_once APPPATH.'/PHPMailer/SMTP.php';
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug  = 1;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure ="tls";
        $mail->Port = 587;
        $mail->Host = "smtp.googleemail.com";
        $mail->Username = 'pratap@jksugars.com';
        $mail->Password= 'Advanced@9594';
        $mail->isHTML(true);
        return $mail;
    }
}