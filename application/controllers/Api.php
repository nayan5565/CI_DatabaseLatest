<?php

require(APPPATH . 'libraries\MultipartCompress.php');

class Api extends CI_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();
//        $this->load->database();
        $this->load->model('CategoryModel');
        $this->load->model('ItemModel');



//        $this->load->view('CategoryView', $data);
    }

    function formatBytes($size, $precision = 2) {
        $base = log($size, 1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }

    public function index() {
        date_default_timezone_set('Asia/Dhaka');
        echo date('Y m d h:i:s A');
//
//        $data['img'] = $this->CategoryModel->getImages();
//        $this->load->view('ItemsView', $data);
//        echo '<pre>', print_r($_FILES), '</pre>';
        $path = "./image2/";
        $files = get_filenames($path);


        foreach ($files as $f) {
            $fileSize = filesize($path . $f);
            echo '</br>size of the file is : ' . $fileSize / 1024 . ' kb';
        }
        //find out how many item have of folder
        echo '</br> size is' . count($files);
        ;
//         $size=$this->formatBytes($fileSize,0);
//         echo '</br>'. $size;
//        $totalSize = $fileSize;
//        if ($fileSize >= 1073741824) {
//            $totalSize = number_format($fileSize / 1073741824, 2) . ' GB';
//            echo '</br>total size of the file is : ' . $totalSize;
//        } elseif ($fileSize >= 1048576) {
//            $totalSize = number_format($fileSize / 1048576, 2) . ' MB';
//            echo '</br>total size of the file is : ' . $totalSize;
//        } elseif ($fileSize >= 1024) {
//            $totalSize = number_format($fileSize / 1024, 2) . ' KB';
//            echo '</br>total size of the file is : ' . $totalSize;
//        }
//        $total = $fileSize / 1024;
//
//
//        echo '</br>total size of the file is : ' . $total;



        $this->load->view('DownloadZipView');
    }

    public function downloadZip() {

        $this->load->library('zip');
//        $this->load->library('MultipartCompress');
        $path = "./image2/";
        $files = get_filenames($path);




        foreach ($files as $f) {
//            echo '<pre>', print_r($files), '</pre>';
            $this->zip->read_file($path . $f, TRUE);
            $fileSize = filesize($path . $f) / 1024;
//
            echo ' file name : ' . $fileSize . '</br>';
        }
        $zip_file = $this->zip->archive("./image3/Download_all_file.zip");

        // download zip file
//        $this->zip->download('Download_all_file');
    }

    public function multiFileUpload() {
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

            $config['upload_path'] = FCPATH . "image2/";
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

                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload')) {
                    $data = $this->upload->data();
                    chmod($data['full_path'], 0755);

                    $insert[$i]['path'] = $data['file_name'];
                    $insert[$i]['size'] = $data['file_size'];
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

    public function deleteForum() {

        $user_id = NULL;
        $delete = NULL;

        extract($_POST);

        if ($delete) {
            $this->ItemModel->delete($user_id);
        }

        $data['field'] = array(
            'id',
            'title',
            'create_date',
            'update_date',
            'details'
        );
        $data['condition'] = array(
            'del_flag' => 0//data available has del_flag 0, deleted data has del_flag 1
        );
        $data['order'] = 'create_date asc';
        $data['results'] = $this->ItemModel->getUser($data);
        $this->load->view('DeleteTable', $data);
    }

    public function getJointData() {
        $cat_id = NULL;

        $submit = NULL;

        extract($_POST);
        if (isset($submit)) {

            $data['records'] = $this->ItemModel->jointTbl($cat_id);
            $this->load->view('table', $data);
        }
//         $this->ItemModel->test();

        $this->load->view('JoinView');
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

    public function inserForum() {
//insert/ update code
        $getCatId = NULL;
        $title = NULL;
        $details = NULL;
        $status = NULL;
        $link = NULL;
        $cat_id = NULL;
        $cat = NULL;
        $id = NULL;
        $submit = NULL;

        extract($_POST);
        $params['id'] = $id;
        $params['title'] = $title;
        $params['details'] = $details;
        $params['status'] = $status;
        $params['link'] = $link;
        if($cat=='bangla'){
            $params['categoryId'] = 1;
        }
         if($cat=='ongko'){
            $params['categoryId'] = 4;
        }
         if($cat=='english'){
            $params['categoryId'] = 2;
        }
         if($cat=='math'){
            $params['categoryId'] = 3;
        }
//        $params['categoryId'] = $cat_id;



        if (isset($submit)) {
            $this->ItemModel->insert($params);
        }
        $data['getCatId'] = $getCatId;
        $data['results'] = $this->CategoryModel->getData();
        $this->load->view('InsertView', $data);
    }

    public function updateForum() {

        $title = NULL;
        $details = NULL;
        $status = NULL;
        $link = NULL;
        $cat_id = NULL;
        $id = NULL;
        $submit = NULL;

        extract($_POST);

        $params['id'] = $id;
        $params['title'] = $title;
        $params['details'] = $details;
        $params['status'] = $status;
        $params['link'] = $link;
        $params['categoryId'] = $categoryId;

        if (isset($submit)) {
            $this->CategoryModel->update($params);
        }

        $this->load->view('InsertView');
    }

    public function insertCat() {
        $data['records'] = $this->CategoryModel->getData();
        $this->load->view('CategoryView', $data);

        $title = 'bangladesh';
        $details = 'bangladesh is the beatiful country';
        $status = 'population is power of bangladesh';
        $id = '';

        $params['title'] = $title;
        $params['details'] = $details;
        $params['status'] = $status;
        $params['id'] = $id;
        $this->CategoryModel->insert2($params);
    }

    public function listView() {
        $data['records'] = $this->ItemModel->getData();
        $this->load->view('ListView', $data);
    }

    public function insertItems() {
        $data['records'] = $this->ItemModel->getData();
        $this->load->view('ItemsView', $data);

        $title = NULL;
        $details = NULL;
        $status = NULL;
        $link = NULL;
        $cat_id = '3';
        $id = '';
        $submit = NULL;

        extract($_POST);
        if (isset($submit)) {
            var_dump($title);
            die();
        }
        $params['id'] = $id;
        $params['title'] = $title;
        $params['details'] = $details;
        $params['status'] = $status;
        $params['link'] = $link;
        $params['cat_id'] = $cat_id;

        $this->ItemModel->insert($params);
    }

    function delete() {
        $this->db->where("id", '11');
        $this->db->delete("data");
    }

    function updateTb() {
        $data = array('name' => 'rakib');
        $this->db->set($data);
        $this->db->where("id", '11');
        $updated = $this->db->update("data", $data);
        print_r($updated);
    }

}
