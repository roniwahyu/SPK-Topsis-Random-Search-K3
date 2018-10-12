<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Dept_model extends CI_Model {

	public function departemen($bulan){
		$this->db->where('bulan',$bulan);
		$result = $this->db->get('view-peminjaman');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
}

/* End of file dept_model.php */
/* Location: ./ */
 ?>