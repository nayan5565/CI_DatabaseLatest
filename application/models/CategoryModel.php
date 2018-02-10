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
            'create_date' => date('Y-m-d H:i:s')
//            'details' => $params['details'],
//            'status' => $params['title'],
//            'id' => $params['id']
        );


        $this->db->insert('items', $fields);
    }
    public function delete($params){
        foreach ($params as $user_id){
             $field = array(
            'del_flag' => 1,
          
        );
        $condition = array('id' =>$user_id);
        $this->db->where($condition);
        $this->db->update('items',$field);
        }
    }

    public function getUser($param){
        $this->db->select($param['field']);//select fields from table
        $this->db->order_by($param['order']);
        $query=$this->db->get_where('items',$param['condition']);
        return $query->result_array();
    }

    public function update($params) {
        $fields = array(
            'title' => $params['title'],
            'create_date' => date('Y-m-d H:i:s')
//            'details' => $params['details'],
//            'status' => $params['title'],
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
            $this->db->insert('items', $fields);
        }
    }

    public function insert2($params) {
        $fields = array(
            'title' => $params['title'],
            'details' => $params['details'],
            'status' => $params['title']
//            'id' => $params['id']
        );
        $this->db->insert('items', $fields);
    }

 

}
