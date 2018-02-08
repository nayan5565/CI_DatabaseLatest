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

    function index() {

//        echo 'hi i am nayan from bangladesh';
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
        $this->CategoryModel->insert($params);
    }

    public function insertItems() {
        $data['records'] = $this->ItemModel->getData();
        $this->load->view('ItemsView', $data);

        $title = 'bangladesh';
        $details = 'bangladesh one ';
        $status = 'bangladesh two ';
        $link = 'nayan';
        $cat_id = '3';
        $id = '';

        $params['title'] = $title;
        $params['details'] = $details;
        $params['status'] = $status;
        $params['link'] = $link;
        $params['cat_id'] = $cat_id;
        $params['id'] = $id;
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
    
    public function getJointData(){
        $id='3';
        $this->ItemModel->jointTbl($id);
    }

}
