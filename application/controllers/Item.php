<?php

require(APPPATH . 'libraries\MultipartCompress.php');

class Item extends CI_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();

        $this->load->model('ItemModel');
        $this->load->model('CategoryModel');
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

    public function insertForum() {
//insert/ update code
        $title = NULL;
        $details = NULL;
        $status = NULL;
        $link = NULL;
        $formCountries = NULL;
        $submit = NULL;

        extract($_POST);
//        if (isset($_POST['inser'])) {
//            if ($_POST['title'] == "") {
//                $error_msg['title'] = 'title is required';
//                echo 'title required';
//            }
//        }

        echo 'id is' . $formCountries;
        $params['title'] = $title;
        $params['details'] = $details;
        $params['status'] = $status;
        $params['link'] = $link;
        $params['categoryId'] = $formCountries;
//        if ($cat == 'bangla') {
//            $params['categoryId'] = 1;
//        }
//        if ($cat == 'ongko') {
//            $params['categoryId'] = 4;
//        }
//        if ($cat == 'english') {
//            $params['categoryId'] = 2;
//        }
//        if ($cat == 'math') {
//            $params['categoryId'] = 3;
//        }
//        $params['categoryId'] = $cat_id;
//        if ($title == "") {
//            echo 'title required</br>';
//        }
        if (isset($submit)) {
            if ($title == "") {
                echo 'title required</br>';
            }
            if ($formCountries == 'NULL') {
                $error_msg['formCountries'] = 'Country is required';

                echo 'Category required';
            } else {

                $this->ItemModel->insert($params);
            }
        }

//        $data['getCatId'] = $getCatId;
        $data['results'] = $this->CategoryModel->getData();
        $this->load->view('InsertItem', $data);
    }

    public function updateForum() {

        $title = NULL;
        $details = NULL;
        $status = NULL;
        $link = NULL;
        $id = NULL;
        $formCountries = NULL;
        $submit = NULL;

        extract($_POST);


        $params['id'] = $id;
        $params['title'] = $title;
        $params['details'] = $details;
        $params['status'] = $status;
        $params['link'] = $link;
        $params['categoryId'] = $formCountries;

        if (isset($submit)) {
            $this->ItemModel->update($params);
        }
        $data['results'] = $this->CategoryModel->getData();
        $this->load->view('UpdateItem', $data);
    }

    public function listView() {
        $data['records'] = $this->ItemModel->getData();
        $this->load->view('ListView', $data);
    }

    public function select() {
        $this->load->view('InsertItem');
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

}
