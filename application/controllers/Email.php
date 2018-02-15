<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
//        $config=array(
//            'protocol'=>'smtp',
//            'smtp_host'=>'ssl://smtp.googlemail.com',
//            'smtp_port'=>465,
//            'smtp_user'=>'nayan5565@gmail.com',
//            'smtp_pass'=>'1%Nayan%3'
//        );
        $this->load->library('email');
        $this->email->set_newline("\r\n");

        $this->email->from('nayan5565@gmail.com', 'nayan5565');
        $this->email->to('rmiraz32@gmail.com');
        $this->email->subject('hello how r u?');
        $this->email->message('hjfskhkg hsgfvdsjbfdsh jfhdsfkjjdsfjh sbfdshgdksnkgjhdi');


        $path = $this->config->item('server_root');
//         $file=$path.'/image2';
//         $this->email-attach($file);

        if ($this->email->send()) {
            echo 'mail sent';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function send($value = '') {
        $this->load->library('email');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['smtp_port'] = "25";
//
        $this->email->initialize($config);
//        $config = array(
//            'mailtype' => "html"
//        );
//        $this->email->initialize($config);

        $this->email->from('nayan5565@gmail.com', 'nayan5565');
        $this->email->to('rmiraz32@gmail.com');
        $this->email->subject('hello how r u?');
        $this->email->message('hjfskhkg hsgfvdsjbfdsh jfhdsfkjjdsfjh sbfdshgdksnkgjhdi');
        if ($this->email->send()) {
            echo 'mail sent';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function send2() {
        $config = array();
        $config['useragent'] = "CodeIgniter";
        $config['mailpath'] = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "localhost";
        $config['smtp_port'] = "25";
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;

        $this->load->library('email');

        $this->email->initialize($config);

        $this->email->message = "Your Message";
        $this->email->subject("Message Subject");
        $this->email->from("nayan5565@gmail.com");
        $this->email->to("rmiraz32@gmail.com");
        $this->email->send();
    }

}
