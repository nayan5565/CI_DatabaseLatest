<?php

class CategoryModel extends CI_Model {

    protected $tableName = 'data';

    public function getData() {

        $query = $this->db->get('category');
        return $query->result();
    }

    public function insert($params) {
        $fields = array(
            'title' => $params['title'],
            'details' => $params['details'],
            'status' => $params['title'],
            'id' => $params['id']
        );
        $this->db->insert('category', $fields);
    }

}
