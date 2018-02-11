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

//        $id = 3;
////         $this->ItemModel->test();
//        $data['records'] = $this->ItemModel->jointTbl($id);
//        $this->load->view('ItemsView', $data);
//       
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
