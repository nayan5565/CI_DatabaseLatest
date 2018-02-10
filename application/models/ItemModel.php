<?php

class ItemModel extends CI_Model {

    protected $tableName = 'data';

    public function getData() {

        $query = $this->db->get('items');
        return $query->result();
    }

    public function insert($params) {
        $fields = array(
            'title' => $params['title'],
            'details' => $params['details'],
            'status' => $params['title'],
            'link' => $params['link'],
            'categoryId' => $params['cat_id'],
            'id' => $params['id']
        );
        $this->db->insert('items', $fields);
    }

    public function jointTbl($id) {
        $this->db->select('
                items.*,              
                category.id,
                category.title as categoryTitle             
                ');
        $this->db->from('items');
        $this->db->join('category', 'category.id=items.categoryId','left');
        $this->db->where('items.id',$id);
        $query = $this->db->get();
//        return $query->result();
        $result = $query->result();
        return $result;
   
    }

    public function test() {
        $this->db->select('items.*');
        $this->db->from('items');
        $this->db->join('category', 'category.id=items.categoryId', 'left');
        $this->db->where('items.id','3');
        $query = $this->db->get();
        $result = $query->result();
        print_r($result);
    }
   

}
