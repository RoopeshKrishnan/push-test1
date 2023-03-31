<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }

    public function insert($table, $data) {
        $this->CI->db->insert($table, $data);
        return $this->CI->db->insert_id();
    }

    public function update($table, $data, $where) {
        $this->CI->db->where($where);
        $this->CI->db->update($table, $data);
        return $this->CI->db->affected_rows();
    }

    public function delete($table, $where) {
        $this->CI->db->where($where);
        $this->CI->db->delete($table);
        return $this->CI->db->affected_rows();
    }

     public function fetch_all($table){
    
        $result = $this->CI->db->get($table);
        return $result;
     }

}
