<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Alternatif_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('alternatif', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function getall() {

        $result = $this->db->get('alternatif');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    
    function get_one($id_alternatif) {
        $this->db->where('id_alternatif', $id_alternatif);
        $result = $this->db->get('02-view-alternatif-alat');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getalt_alat($id) {
        $this->db->where('id_alternatif', $id);
        $result = $this->db->get('02-view-alternatif-alat');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'alternatif' => $this->input->post('alternatif', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('alternatif', $data);
        return $this->db->insert_id();
    }

    function update($id_alternatif) {
        $data = array(
        'id_alternatif' => $this->input->post('id_alternatif',TRUE),
       'alternatif' => $this->input->post('alternatif', TRUE),
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->update('alternatif', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_alternatif) {
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->delete('alternatif'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_alternatif, '.$value.' from alternatif order by id_alternatif asc');
        $result[0]="-- Pilih Urutan id_alternatif --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_alternatif]= $row->$value;
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
