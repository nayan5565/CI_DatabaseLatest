<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
//        $this->load->library('email');
//        $config = array(
//            'protocol' => 'smtp',
//            'smtp_host' => 'ssl://smtp.googlemail.com',
//            'smtp_port' => 465,
//            'smtp_user' => 'nayan5565@gmail.com',
//            'smtp_pass' => '1%Nayan%3'
//        );
//        $this->email->initialize($config);
//
//        $this->email->set_newline("\r\n");
//
//        $this->email->from('nayan5565@gmail.com', 'nayan5565');
//        $this->email->to('rmiraz32@gmail.com');
//        $this->email->subject('hello how r u?');
//        $this->email->message('hjfskhkg hsgfvdsjbfdsh jfhdsfkjjdsfjh sbfdshgdksnkgjhdi');
//
//
//        $path = $this->config->item('server_root');
////         $file=$path.'/image2';
////         $this->email-attach($file);
//
//        if ($this->email->send()) {
//            echo 'mail sent';
//        } else {
//            show_error($this->email->print_debugger());
//        }
    }

    public function folder() {
        $int = 001;

        $path = "./zipfolder/";
        $files = get_filenames($path);
        //find out how many item have of folder

        $this->load->library('email');
//        for ($i = 0; $i < count($files); $i++) {
//
//            $this->email->clear();
//            $this->email->from('darushsalam5565@gmail.com', 'dev');
//            $this->email->to('nayan5565@gmail.com');
//            $this->email->subject('file');
//            $this->email->message('i have attach zip file another time ' . $files[$i]);
//            //server_root use for file send by mail
//            $path = $this->config->item('server_root');
//
//
//            $basePath = $path . '/Codeigniter/zipfolder/';
//            $this->email->attach($basePath . $files[$i]);
//
//            if ($this->email->send()) {
//                echo 'mail sent';
//            } else {
//                show_error($this->email->print_debugger());
//            }
//
//            echo '</br> file name : ' . $files[$i] . '</br>';
//        }
//        echo 'test =' . $files[3];
        foreach ($files as $f) {


            $this->email->from('darushsalam5565@gmail.com', 'dev');
            $this->email->to('nayan5565@gmail.com');
            $this->email->subject('file');
            $this->email->message('i have attach zip file another time ' . $f);
            //server_root use for file send by mail
            $path = $this->config->item('server_root');


            $basePath = $path . '/Codeigniter/zipfolder/';
            $this->email->attach($basePath . $f);

            if ($this->email->send()) {
                echo 'mail sent';
            } else {
                show_error($this->email->print_debugger());
            }
            $this->email->clear();
//            $this->send($f);
//            $int++;
//            $fileSize = filesize($path . $f) / 1024;



            echo '</br> file name : ' . $f . '</br>';
//            echo '</br> var int : ' . $fileSize.  '</br>';
        }
        echo '</br> size is ' . count($files);
    }

    public function send($fileName) {

//        $config['protocol'] = 'smtp';
//        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
//        $config['smtp_port'] = '465';
//        $config['smtp_user'] = 'developernayan5565';
//        $config['smtp_pass'] = '01913555965';
////        $config['smtp_crypto'] = 'tls';
//        $config['newline'] = "\r\n";
//        $config['crlf'] = "\r\n";
//        $config['ExecTimeLimit'] = 6000;
//        $config['mailtype'] = "html";
//        $this->email->initialize($config);

        $this->email->from('darushsalam5565@gmail.com', 'dev');
        $this->email->to('nayan5565@gmail.com');
        $this->email->subject('file');
        $this->email->message('i have attach zip file another time ' . $fileName);
        //server_root use for file send by mail
        $path = $this->config->item('server_root');

//        $file = $path . '/Codeigniter/zipfolder/Download_all_file.zip.004';
//        $file2 = $path . '/Codeigniter/zipfolder/Download_all_file.zip.002';
//        $file3 = $path . '/Codeigniter/zipfolder/Download_all_file.zip.003';
        $basePath = $path . '/Codeigniter/zipfolder/';
//        echo $file;
//        $path = "./zipfolder/";
//        $files = get_filenames($path);
//        echo 'test ='. base_url().$files[3];
//        $this->email->attach($file);
//        $this->email->attach($file2);
        $this->email->attach($basePath . $fileName);

        if ($this->email->send()) {
//            redirect(base_url() . 'Email/folder');
            echo 'mail sent';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function send2() {
        echo 'test';
        $this->load->library('email');


        $this->email->initialize(array(
            'mailtype' => 'html',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'developernayan5565',
            'smtp_pass' => '01913555965',
//            'smtp_crypto' => 'tls',
            'smtp_port' => 465,
            'charset' => 'iso-8859-1',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ));
        $this->email->from('developernayan5565.com', 'dev');

        echo 'cswef';

        $this->email->to(array('nayan5565@gmail.com'));
        $this->email->subject('test');
        $msg = 'test darus';
        $this->email->message($msg);
        echo 'xdfsedgfr';
        $sent_msg = $this->email->send();
        if ($sent_msg) {
            echo 'success';
        } else {
            echo $this->email->print_debugger();
        }
    }

}
