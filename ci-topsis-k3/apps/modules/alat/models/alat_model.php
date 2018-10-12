<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Alat_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('alat', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getall() {
        $this->db->order_by('id_alat','ASC');
        $result = $this->db->get('alat');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_alat) {
        $this->db->where('id_alat', $id_alat);
        $result = $this->db->get('alat');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'nama_alat' => $this->input->post('nama_alat', TRUE),
           
            'area_perlindungan' => $this->input->post('area_perlindungan', TRUE),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('alat', $data);
    }

    function update($id_alat) {
        $data = array(
        'id_alat' => $this->input->post('id_alat',TRUE),
       'nama_alat' => $this->input->post('nama_alat', TRUE),
       
       'area_perlindungan' => $this->input->post('area_perlindungan', TRUE),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id_alat', $id_alat);
        $this->db->update('alat', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_alat) {
        $this->db->where('id_alat', $id_alat);
        $this->db->delete('alat'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_alat, '.$value.' from alat order by id_alat asc');
        $result[0]="-- Pilih Urutan id_alat --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_alat]= $row->$value;
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
