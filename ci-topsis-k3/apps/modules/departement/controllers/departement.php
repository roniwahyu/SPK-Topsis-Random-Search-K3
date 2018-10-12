<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Departement extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('dept_model','deptdb',true);
		 $this->load->library(array('Datatables','ion_auth/ion_auth'));
     
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','kriteria');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

	}
	public function index()
	{
		$this->template->load_view('laporan',array(
			'laporan'=>$this->show_laporan('03'),
			));
		
		
	}
	function show_laporan($bulan){
		$hasil=$this->deptdb->departemen($bulan);
			$div="";
			$div.="<table class='table table-condensed table-striped table-hover'>";
			
		foreach ($hasil as $value) {
			# code...
			$div.="<tr>";
			$div.="<td>".$value['departemen']."</td>";
			$div.="<td>".$value['jml']."</td>";
			$div.="<td>".$value['bulan']."</td>";
			
			$div.="</tr>";
			
		}
		$div.="</table>";
			return $div;
	}
}

/* End of file departement.php */
/* Location: ./ */
 ?>