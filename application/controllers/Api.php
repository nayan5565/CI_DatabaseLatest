<?php

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        $this->load->database();
        $this->load->model('CategoryModel');
        $this->load->model('ItemModel');



//        $this->load->view('CategoryView', $data);
    }

    public function index() {
        date_default_timezone_set('Asia/Dhaka');
        echo date('Y m d h:i:s A');

        $data['img'] = $this->CategoryModel->getImages();
        $this->load->view('ItemsView', $data);
//        $submit = NULL;
//
//        extract($_POST);
//
//        if ($submit) {
//            redirect('api/upload');
//        }

        $this->load->view('FileUploadView', array('error' => ''));
       
//        $id = 3;
////         $this->ItemModel->test();
//        $data['records'] = $this->ItemModel->jointTbl($id);
//        $this->load->view('ItemsView', $data);
//       
    }

    public function upload() {
        $config['upload_path'] = "./image2/";


        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('featured_image')) {
            $error = array('error' => $this->upload->display_errors());
//            $this->session->set_flashdata('notification', array('type' => 'danger', 'message' => 'file too large to upload'));
            redirect('api/index');
//            $this->load->view('FileUploadView', $error);
        } else {
            $img_data = array('upload_data' => $this->upload->data());
            $data['img2'] = base_url() . '/image2/' . $img_data['file_name'];
            $this->load->view('ShowImageView', $data);
        }
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
        $params['categoryId'] = $cat_id;

        if (isset($submit)) {
            $this->ItemModel->insert($params);
        }

        $this->load->view('InsertView');
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
