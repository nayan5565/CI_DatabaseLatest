<?php

require(APPPATH . 'libraries\MultipartCompress.php');

class Category extends CI_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();

        $this->load->model('CategoryModel');

//        $this->load->view('CategoryView', $data);
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
            'create_date',
            'update_date',
            'details'
        );
//        $data['condition'] = array(
//            'del_flag' => 0//data available has del_flag 0, deleted data has del_flag 1
//        );
        $data['order'] = 'create_date asc';
        $data['results'] = $this->CategoryModel->getUser($data);
        $this->load->view('DeleteTable', $data);
    }

    public function insertForum() {
//insert/ update code
        $title = NULL;
        $details = NULL;
        $status = NULL;
        $submit = NULL;

        extract($_POST);

        $params['title'] = $title;
        $params['details'] = $details;
        $params['status'] = $status;

        if (isset($submit)) {
            $this->CategoryModel->insert($params);
        }
        $data['results'] = $this->CategoryModel->getData();
        $this->load->view('InsertCategory', $data);
    }

    public function updateForum() {

        $title = NULL;
        $details = NULL;
        $status = NULL;
        $id = NULL;
        $submit = NULL;

        extract($_POST);

        $params['id'] = $id;
        $params['title'] = $title;
        $params['details'] = $details;
        $params['status'] = $status;

        if (isset($submit)) {
            $this->CategoryModel->update($params);
        }

        $this->load->view('UpdateCategory');
    }

    public function insertCat() {
        $data['records'] = $this->CategoryModel->getData();
        $this->load->view('CategoryView', $data);

        $title = 'bangladesh';
        $details = 'bangladesh is the beatiful country';
        $status = 'population is power of bangladesh';
       

        $params['title'] = $title;
        $params['details'] = $details;
        $params['status'] = $status;
      
        $this->CategoryModel->insert2($params);
    }

    public function listView() {
        $data['records'] = $this->CategoryModel->getData();
        $this->load->view('ListView', $data);
    }

    function delete() {
        $this->db->where("id", '11');
        $this->db->delete("data");
    }

}
