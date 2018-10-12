<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Nilai_resiko_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('nilai_resiko', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_nilai_resiko) {
        $this->db->where('id_nilai_resiko', $id_nilai_resiko);
        $result = $this->db->get('nilai_resiko');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_alternatif' => $this->input->post('id_alternatif', TRUE),
           
            'id_kriteria' => $this->input->post('id_kriteria', TRUE),
           
            'id_resiko' => $this->input->post('id_resiko', TRUE),
           
            'nilai_resiko' => $this->input->post('nilai_resiko', TRUE),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('nilai_resiko', $data);
    }
    function save_batch($data){
        $this->db->insert_batch('nilai_resiko',$data);
        return $this->db->insert_id();
    }

    function update($id_nilai_resiko) {
        $data = array(
        'id_nilai_resiko' => $this->input->post('id_nilai_resiko',TRUE),
       'id_alternatif' => $this->input->post('id_alternatif', TRUE),
       
       'id_kriteria' => $this->input->post('id_kriteria', TRUE),
       
       'id_resiko' => $this->input->post('id_resiko', TRUE),
       
       'nilai_resiko' => $this->input->post('nilai_resiko', TRUE),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id_nilai_resiko', $id_nilai_resiko);
        $this->db->update('nilai_resiko', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_nilai_resiko) {
        $this->db->where('id_nilai_resiko', $id_nilai_resiko);
        $this->db->delete('nilai_resiko'); 
       
    }
    function delete_alt($id_alternatif) {
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->delete('nilai_resiko'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_nilai_resiko, '.$value.' from nilai_resiko order by id_nilai_resiko asc');
        $result[0]="-- Pilih Urutan id_nilai_resiko --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_nilai_resiko]= $row->$value;
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
