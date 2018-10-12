<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class site_model extends CI_Model {

	 function hasil() {
        
        $result = $this->db->get('08-topsis-rank');
        if ($result->num_rows()>0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
}

/* End of file site_model.php */
/* Location: ./ */

 ?>