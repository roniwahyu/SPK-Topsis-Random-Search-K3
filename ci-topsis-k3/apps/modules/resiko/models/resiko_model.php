<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Resiko_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('resiko', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getall() {

        $result = $this->db->get('02-view-kriteria-resiko');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_resiko) {
        $this->db->where('id_resiko', $id_resiko);
        $result = $this->db->get('resiko');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_kriteria' => $this->input->post('id_kriteria', TRUE),
           
            'resiko' => $this->input->post('resiko', TRUE),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('resiko', $data);
    }

    function update($id_resiko) {
        $data = array(
        'id_resiko' => $this->input->post('id_resiko',TRUE),
       'id_kriteria' => $this->input->post('id_kriteria', TRUE),
       
       'resiko' => $this->input->post('resiko', TRUE),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id_resiko', $id_resiko);
        $this->db->update('resiko', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_resiko) {
        $this->db->where('id_resiko', $id_resiko);
        $this->db->delete('resiko'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_resiko, '.$value.' from resiko order by id_resiko asc');
        $result[0]="-- Pilih Urutan id_resiko --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_resiko]= $row->$value;
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
