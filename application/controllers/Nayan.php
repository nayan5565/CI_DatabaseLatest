<?php

class Nayan extends CI_Controller {

    protected $database_name = '';

    public function __construct() {
        parent::__construct();
//        $this->load->database();
        $this->load->model('CategoryModel');
        $this->load->model('ItemModel');



//        $this->load->view('CategoryView', $data);
    }

    public function index() {
        
        $user_id = NULL;
        $delete = NULL;
        
        extract($_POST);
        
        if ($delete) {
            $this->CategoryModel->delete($user_id);
        }

        $data['field'] = array(
            'id',
            'title',
            'create_date'
        );
        $data['condition'] = array(
            'del_flag' => 0//data available has del_flag 0, deleted data has del_flag 1
        );
        $data['order'] = 'create_date asc';
        $data['results'] = $this->CategoryModel->getUser($data);
        $this->load->view('DeleteTable', $data);
        
        //insert/ update code
//        $title = NULL;
//
//        $id = NULL;
//        $submit = NULL;
//
//        extract($_POST);
//
//        $params['id'] = $id;
//        $params['title'] = $title;
//
//        if (isset($submit)) {
//            $this->CategoryModel->insert($params);
//        }
//
//        $this->load->view('InsertView');

//        
//        $data['records'] = $this->ItemModel->getData();
//        $this->load->view('ListView', $data);
//
//        $id = 3;
//         $this->ItemModel->test();
//        $data['records'] = $this->ItemModel->jointTbl($id);
//        $this->load->view('table', $data);
//        $title = $this->input->post('title');
//        $details = $this->input->post('details');
//        $data2 = array('title' => $title, 'details' => $details);
//        $this->CategoryModel->add($data2);
    }

    public function deleteForum() {

        $user_id = NULL;
        $delete = NULL;
        
        extract($_POST);
        
        if ($delete) {
            $this->CategoryModel->delete($user_id);
        }
        

        $data['field'] = array(
            'id',
            'title',
            'create_date'
        );
        $data['condition'] = array(
            'del_flag' => 0//data available has del_flag 0, deleted data has del_flag 1
        );
        $data['order'] = 'create_date asc';
        $data['results'] = $this->CategoryModel->getUser($data);
        $this->load->view('DeleteTable', $data);
    }

    public function inserForum() {

//        $title = $this->input->post('title');
//        $details = $this->input->post('details');
//        $data2 = array('title' => $title, 'details' => $details);
//        $this->CategoryModel->add($data2);
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

    public function getJointData() {
        $id = 3;
//         $this->ItemModel->test();
        $data['records'] = $this->ItemModel->jointTbl($id);
        $this->load->view('ItemsView', $data);
    }

}
