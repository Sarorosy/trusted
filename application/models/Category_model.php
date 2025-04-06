<?php
class Category_model extends CI_Model {

    public function get_all() {
        return $this->db->get('tbl_categories')->result();
    }

    public function insert($data) {
        return $this->db->insert('tbl_categories', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('tbl_categories', $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete('tbl_categories');
    }
}
