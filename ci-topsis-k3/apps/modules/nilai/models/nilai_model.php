<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Nilai_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('nilai', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_nilai) {
        $this->db->where('id_nilai', $id_nilai);
        $result = $this->db->get('nilai');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_dosen' => $this->input->post('id_dosen', TRUE),
           
            'id_kriteria' => $this->input->post('id_kriteria', TRUE),
           
            'nilai' => $this->input->post('nilai', TRUE),
           
            'datetime' => ('Y-m-d H:m:s'),
           
        );
        $this->db->insert('nilai', $data);
    }

    function update($id_nilai) {
        $data = array(
        'id_nilai' => $this->input->post('id_nilai',TRUE),
       'id_dosen' => $this->input->post('id_dosen', TRUE),
       
       'id_kriteria' => $this->input->post('id_kriteria', TRUE),
       
       'nilai' => $this->input->post('nilai', TRUE),
       
       'datetime' => ('Y-m-d H:m:s'),
       
        );
        $this->db->where('id_nilai', $id_nilai);
        $this->db->update('nilai', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_nilai) {
        $this->db->where('id_nilai', $id_nilai);
        $this->db->delete('nilai'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_nilai, '.$value.' from nilai order by id_nilai asc');
        $result[0]="-- Pilih Urutan id_nilai --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_nilai]= $row->$value;
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
