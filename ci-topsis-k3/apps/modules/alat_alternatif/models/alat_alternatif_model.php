<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Alat_alternatif_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('alat_alternatif', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($alat_alt_id) {
        $this->db->where('alat_alt_id', $alat_alt_id);
        $result = $this->db->get('alat_alternatif');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_alat' => $this->input->post('id_alat', TRUE),
           
            'id_alternatif' => $this->input->post('id_alternatif', TRUE),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('alat_alternatif', $data);
    }
    function save_batch($data) {
          
        $this->db->insert_batch('alat_alternatif', $data);
    }

    function update($alat_alt_id) {
        $data = array(
        'alat_alt_id' => $this->input->post('alat_alt_id',TRUE),
       'id_alat' => $this->input->post('id_alat', TRUE),
       
       'id_alternatif' => $this->input->post('id_alternatif', TRUE),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('alat_alt_id', $alat_alt_id);
        $this->db->update('alat_alternatif', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }
    function delete_alat($id_alternatif){
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->delete('alat_alternatif'); 
    }
    function delete($alat_alt_id) {
        $this->db->where('alat_alt_id', $alat_alt_id);
        $this->db->delete('alat_alternatif'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select alat_alt_id, '.$value.' from alat_alternatif order by alat_alt_id asc');
        $result[0]="-- Pilih Urutan alat_alt_id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->alat_alt_id]= $row->$value;
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
