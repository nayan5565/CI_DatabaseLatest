<?php

require(APPPATH . 'libraries\MultipartCompress.php');

class FileUpload extends CI_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();
//        $this->load->database();
        $this->load->model('CategoryModel');
        $this->load->model('ItemModel');



//        $this->load->view('CategoryView', $data);
    }

    public function createFolder() {
        $email = 'nayan5565@gmail.com';
        $domain = strstr($email, '@');
        echo 'email one ' . $domain . '</br>'; // prints @example.com

        $user = strstr($email, '@', true); // As of PHP 5.3.0
        echo 'email two ' . $user . '</br>';
        $targetfolder = $user;
        if (!file_exists($targetfolder)) {
            if (mkdir($targetfolder)) {
                echo "Created target folder $targetfolder";
            }
        } else {
            echo "Already Created target folder $targetfolder";
        }
    }

    function formatBytes($size, $precision = 2) {
        $base = log($size, 1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }

    public function index() {

        date_default_timezone_set('Asia/Dhaka');
        echo date('Y m d h:i:s A');
        $path = "./" . $user . "/";
        $files = get_filenames($path);

        foreach ($files as $f) {
            $fileSize = filesize($path . $f);
            echo '</br>size of the file is : ' . $fileSize / 1024 . ' kb';
        }
        //find out how many item have of folder
        echo '</br> size is' . count($files);
        ;
        $this->load->view('DownloadZipView');
    }

    public function multiFileUpload() {
        date_default_timezone_set('Asia/Dhaka');
        date('d m y h:i:s A');
        $email = 'nayan5565@gmail.com';
        $domain = strstr($email, '@');


        $user = strstr($email, '@', true); // As of PHP 5.3.0

        $targetfolder = $user;
        if (!file_exists($targetfolder)) {
            if (mkdir($targetfolder)) {
                echo "Created target folder $targetfolder";
            }
        } else {
            echo "Already Created target folder $targetfolder";
        }
        // multiple file upload
        if ($this->input->post('file_submit') && !empty($_FILES['file_upload']['name'])) {
            $numb_of_files = sizeof($_FILES['file_upload']['tmp_name']);
            $files = $_FILES['file_upload'];
            for ($i = 0; $i < $numb_of_files; $i++) {
                if ($_FILES['file_upload']['error'][$i] != 0) {
                    $this->form_validation->set_message('file_upload', 'couldnt upload file');
                    return FALSE;
                }
            }

//            $config['upload_path'] = FCPATH . "image2/";
            $config['upload_path'] = $targetfolder;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|zip|mp4';
//            $config['thumb.width'] = 50;      // Thumbnail width (pixels)
//            $config['thumb.height'] = 50;
            $config['encrypt_name'] = TRUE;

            for ($i = 0; $i < $numb_of_files; $i++) {
                $_FILES['file_upload']['name'] = $files['name'][$i];
                $_FILES['file_upload']['type'] = $files['type'][$i];
                $_FILES['file_upload']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file_upload']['error'] = $files['error'][$i];
                $_FILES['file_upload']['size'] = $files['size'][$i];
                echo $_FILES['file_upload']['name'] = $files['name'][$i];

                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload')) {
                    $data = $this->upload->data();
                    chmod($data['full_path'], 0755);

                    $insert[$i]['path'] = $data['file_name'];
                    $insert[$i]['size'] = $data['file_size'];
                    $insert[$i]['directory'] = $targetfolder;
                    $insert[$i]['created '] = date('Y-m-d H:i:s');
//                    echo '<pre>';
//                    print_r($data);
//                    echo '</pre>';
                }
            }
            $this->db->insert_batch('images', $insert);
        }
        $this->data = array(
            'query' => $this->db->get('images')
        );

        $this->load->view('MultiFileUpload', $this->data);
    }

    public function ima() {
        $this->load->view('FileUploadView', array('error' => ''));
    }

    public function upload() {
        $config['upload_path'] = "./image2/";


        $config['allowed_types'] = 'gif|jpg|png|jpeg|zip|mp4';
//        $config['max_size'] = '1024';
//        $config['max_width'] = '512';
//        $config['max_height'] = '512';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
//            $this->session->set_flashdata('notification', array('type' => 'danger', 'message' => 'file too large to upload'));
//            redirect('api/index');
            $this->load->view('FileUploadView', $error);
        } else {
            $img_data = array('upload_data' => $this->upload->data());
            $data['img2'] = base_url() . '/image2/' . $img_data['upload_data']['file_name'];
            $dbset = base_url() . '/image2/' . $img_data['upload_data']['file_name'];
            $file_size = $img_data['upload_data']['file_size'];
            $this->load->view('ShowImageView', $data);
        }
        $data2 = array(
            'path' => $dbset,
            'size' => $file_size
        );
        $this->db->insert('images', $data2);

        $this->load->view('FileUploadView', array('error' => ''));
    }

    public function imageUpload() {
        $destination = "images/" . $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp_name, $destination);
        $data = array(
            'path' => $destination
        );
        $this->db->insert('images', $data);
        echo($temp_name);
    }

}
