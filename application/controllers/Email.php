<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require('application\PHPMailer\Exception.php');
require('application\PHPMailer\SMTP.php');
require('application\PHPMailer\PHPMailer.php');
class Email extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    public function send_mail() {
        // $this->load->library('phpmailer_lib');
        $this->load->library('email');

        $config= array(
            'protocol'=>'smtp',
            'smtp_host'=>'smtp/gmail.com',
            'smtp_port'=>465,
            'smtp_user'=>'pratap@jksugars.com',
            'smtp_pass'=>'Advanced@9594',
           ' mailtype'=>'html',
           'smtp_timeout'=>30
        );
        $this->email->initialize($config);
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    // $mail->Host       = 'smtp.gmail.com';                    
    // $mail->SMTPAuth   = true;                                   
    // $mail->Username   = 'pratap@jksugars.com';                     
    // $mail->Password   = 'Advanced@9594';                               
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    // $mail->Port       = 587;            
        
        $this->email->from('pratap@jksugars.com', 'PhpMailer');
        $this->email->to('pratap@jksugars.com');
        $this->email->subject('Send Email ');
        $this->email->message('The email send using codeigniter Phpmailer');
        //Send mail
        if($this->email->send())
            $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        else
            $this->session->set_flashdata("email_sent","You have encountered an error");
        $this->load->view('email_form');
        print_r($this->email->print_debugger());
    }
}
?>





