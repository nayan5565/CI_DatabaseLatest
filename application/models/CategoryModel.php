<?php

class CategoryModel extends CI_Model {

    protected $tableName = 'data';

    public function getData() {

        $query = $this->db->get('category');
        return $query->result();
    }

    public function delete($params) {
        foreach ($params as $user_id) {
            $field = array(
                'del_flag' => 1,
            );
            $condition = array('id' => $user_id);
            $this->db->where($condition);
            $this->db->update('category', $field);
        }
    }

    public function getUser($param) {
        $this->db->select($param['field']); //select fields from table
        $this->db->order_by($param['order']);
        $query = $this->db->get_where('category', $param['condition']);
        return $query->result_array();
    }

    public function insert($params) {

        date_default_timezone_set('Asia/Dhaka');
        date('d m y h:i:s A');
        $fields = array(
            'title' => $params['title'],
            'details' => $params['details'],
            'status' => $params['status'],
            'link' => $params['link'],
            'categoryId' => $params['categoryId'],
            'create_date' => date('Y-m-d H:i:s'),
            'id' => $params['id'],
        );


        $this->db->insert('category', $fields);
    }

    public function update($params) {
        date_default_timezone_set('Asia/Dhaka');
        $fields = array(
            'title' => $params['title'],
            'details' => $params['details'],
            'status' => $params['status'],
            'link' => $params['link'],
            'categoryId' => $params['categoryId']

//            'id' => $params['id']
        );
        $condition = array('id' => $params['id']);
        $query = $this->db->get_where('items', $condition);
        $result = $query->result_array();

        if (!empty($result)) {
            $fields['update_date'] = date('Y-m-d H:i:s');
            $this->db->where($condition);
            $this->db->update('items', $fields);
        } else {
            $fields['create_date'] = date('Y-m-d H:i:s');
            $this->db->insert('category', $fields);
        }
    }

}
