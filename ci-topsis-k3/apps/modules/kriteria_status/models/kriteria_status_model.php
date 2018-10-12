<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Kriteria_status_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('kriteria_status', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_kriteriastatus) {
        $this->db->where('id_kriteriastatus', $id_kriteriastatus);
        $result = $this->db->get('kriteria_status');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getkriteria($status) {
        $this->db->where('status',$status);
        $result = $this->db->get('01-view-kriteria-status');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'status' => $this->input->post('status', TRUE),
           
            'id_kriteria' => $this->input->post('id_kriteria', TRUE),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('kriteria_status', $data);
    }

    function update($id_kriteriastatus) {
        $data = array(
        'id_kriteriastatus' => $this->input->post('id_kriteriastatus',TRUE),
       'status' => $this->input->post('status', TRUE),
       
       'id_kriteria' => $this->input->post('id_kriteria', TRUE),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id_kriteriastatus', $id_kriteriastatus);
        $this->db->update('kriteria_status', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_kriteriastatus) {
        $this->db->where('id_kriteriastatus', $id_kriteriastatus);
        $this->db->delete('kriteria_status'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_kriteriastatus, '.$value.' from kriteria_status order by id_kriteriastatus asc');
        $result[0]="-- Pilih Urutan id_kriteriastatus --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_kriteriastatus]= $row->$value;
        }
        return $result;
    }

    //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_drop_array($db,$key,$value){
        $result = array();
        $array_keys_values = $this->db->query('select '.$key.','.$value.' from '.$db.' order by '.$key.' asc');
        $result[0]="-- Pilih ".$value." --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->$key]= $row->$value;
        }
        return $result;
    }
    
}
?>
