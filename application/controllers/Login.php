<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    function index() {
        print_r($this->LoginModel->getData());
        echo '<center><a href="' . base_url() . 'login/log_out">logout</a></center> ';
    }

    public function home() {
        $data['colorh'] = '#ff0000';
        $data['title'] = 'Welcome to Home';
        $this->load->view('NavView', $data);
    }

    public function news() {
        $data['title'] = 'Welcome to News';
        $data['colorn'] = '#ff0000';
        $this->load->view('NavView', $data);
    }

    public function contacts() {
        $data['title'] = 'Welcome to Contacts';
        $data['colorc'] = '#ff0000';
        $this->load->view('NavView', $data);
    }

    public function sign_up() {
        $data['title'] = 'please login';
        $this->load->view('LoginView', $data);
    }

    public function login_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');


            if ($this->LoginModel->canLogin($username, $password)) {
                $session_data = array(
                    'username' => $username
//                    'password' => $password
                );
//                echo 'username is '.$username;
                $this->session->set_userdata($session_data);
//                $this->session->set_userdata('username', 'nayan');
//                echo 'success';
                $this->enter();
//                redirect(base_url() . 'login/enter');
            } else {
                echo 'invalid username or pass';
                $this->session->set_flashdata('error', 'invalid username or pass');
                $this->sign_up();
            }
        } else {
            echo 'filed is empty';
            $this->session->set_flashdata('error', 'field is required');
            $this->sign_up();
        }
    }

    public function enter() {
        if ($this->session->userdata('username') != '') {

            $data['title'] = 'Welcome to Dashboard';
            $this->load->view('NavView', $data);
//            echo '<h2>Welcome to Dashboard ' . $this->session->userdata('username') . '</h2>';
//            echo '<a href="' . base_url() . 'login/log_out">logout_enter</a>';
        } else {

//            print_r($this->session->userdata('username'));
            echo '</br>enter username  = ' . $this->session->userdata('username') . '</br>';
            echo '<a href="' . base_url() . 'login/log_out">logout</a>';
        }
    }

    public function log_out() {
        $this->session->unset_userdata('username');
        echo 'log_out';
        redirect(base_url() . 'login/sign_up');
    }

}
