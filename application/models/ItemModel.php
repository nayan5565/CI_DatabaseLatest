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
                items.title,
                items.id,
                items.categoryId,
                items.link,
                items.status              
                category.id
                category.title
                
                ');
        $this->db->from('items');
        $this->db->joint('category', 'category.id=items.categoryId');
        $this->db->where(array('items.id', $id));
        $query = $this->db->get();
        return $query->result();
    }

}
