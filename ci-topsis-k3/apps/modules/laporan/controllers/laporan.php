<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Laporan extends MX_Controller {
	function __construct(){
		parent::__construct();
		  $this->load->library(array('Datatables','ion_auth/ion_auth','table'));
        $this->load->model('site/site_model','sitedb',TRUE);
        $this->load->model('nilai/nilai_model','nilaidb',TRUE);
        $this->load->model('kriteria/kriteria_model','kriteriadb',TRUE);
        $this->load->model('resiko/resiko_model','resikodb',TRUE);
        $this->load->model('alternatif/alternatif_model','alternatifdb',TRUE);
        $this->load->model('kriteria_status/kriteria_status_model','cr_stdb',TRUE);
       
	}
	public function index(){
		$this->template->add_js('k3.js');	
		$this->template->load_view('laporan',array(
			'hasil'=>$this->show_laporan(),
			'kriteria'=>$this->show_criteria(),
			'resiko'=>$this->show_resiko(),
		));	
	}
	function cetak($lapor=null){

		$this->template->load_view('laporan',array(
			'table'=>$this->tampil_laporan($lapor),
			
		));	
	}

	function tampil_laporan($lapor){
		switch ($lapor) {
			case 'alternatif':
				# code...
				return $this->show_laporan();
			break;
			case 'kriteria':
				# code...
				return $this->show_criteria();
			break;
			case 'resiko':
				return $this->show_resiko();
			break;
			
		}

	}
	public function show_criteria(){
		$kriteria=$this->kriteriadb->getall();
		$div='';
		// $div.='<h3>Kriteria</h3>';
		$div.='<table class="table table-bordered table-striped table-hover table-condensed">';
		$div.='<thead><tr>';
		$div.='<th>No.</th>';
		$div.='<th>Kriteria</th>';
		$div.='<th>Keterangan</th>';
		$div.='<th>Min</th>';
		$div.='<th>Max</th>';		
		$div.='<th>Bobot</th>';
		$div.='</tr></thead><tbody>';
			
		$i=1;
		foreach ($kriteria as $key => $value) {
			$div.='<tr>';
			$div.='<td>'.$i.'</td>';
			$div.='<td>'.$value['nama_kriteria'].'</td>';
			$div.='<td>'.$value['keterangan'].'</td>';
			$div.='<td>'.$value['nilai_min'].'</td>';
			$div.='<td>'.$value['nilai_max'].'</td>';
			$div.='<td>'.$value['bobot'].'</td>';
			$div.='</tr>';
			$i++;
		}
		$div.='</tbody></table>';

		return $div;
	
	}
	public function show_resiko(){
		$resiko=$this->resikodb->getall();
		$div='';
		// $div.='<h3>Kriteria</h3>';
		$div.='<table class="table table-bordered table-striped table-hover table-condensed">';
		$div.='<thead><tr>';
		$div.='<th>No.</th>';
		$div.='<th>Resiko</th>';
		$div.='<th>Kriteria</th>';
		$div.='<th>Keterangan</th>';
		$div.='</tr></thead><tbody>';
			
		$i=1;
		foreach ($resiko as $key => $value) {
			$div.='<tr>';
			$div.='<td>'.$i.'</td>';
			
			$div.='<td>'.$value['resiko'].'</td>';
			$div.='<td>'.$value['nama_kriteria'].'</td>';
			$div.='<td>'.$value['keterangan'].'</td>';
			$div.='</tr>';
			$i++;
		}
		$div.='</tbody></table>';

		return $div;
	
	}
	public function show_alternatif(){
		$alternatif=$this->alternatifdb->getall();
		$div='';
		// $div.='<h3>Kriteria</h3>';
		$div.='<table class="table table-striped table-hover table-condensed">';
		$div.='<thead><tr>';
		$div.='<th>No.</th>';
		$div.='<th>Alternatif</th>';
		$div.='<th>Datetime</th>';
	
		
		
		$div.='</tr></thead><tbody>';
			
		$i=1;
		foreach ($alternatif as $key => $value) {
			$div.='<tr>';
			$div.='<td>'.$i.'</td>';
			$div.='<td>'.$value['alternatif'].'</td>';
			$div.='<td>'.$value['datetime'].'</td>';
			
			$div.='</tr>';
			$i++;
		}
		$div.='</tbody></table>';

		return $div;
	
	}
	public function show_laporan(){
		$hasil=$this->sitedb->hasil();
		$div='';
		// $div.='<h3>Kriteria</h3>';
		$div.='<table class="table table-bordered table-striped table-hover table-condensed">';
		$div.='<thead><tr>';
		$div.='<th>No.</th>';
		$div.='<th>Alternatif</th>';
		$div.='<th>Nilai TOPSIS</th>';
		$div.='<th>Ranking</th>';
		
		
		$div.='</tr></thead><tbody>';
		$urutan=array(
			'1'=>'label-success',
			'2'=>'label-info',
			'3'=>'label-warning',
			'4'=>'label-danger',
			);
		$i=1;
		foreach ($hasil as $key => $value) {
			$div.='<tr>';
			$div.='<td>'.$i.'</td>';
			$div.='<td>'.$value['alternatif'].'</td>';
			$div.='<td>'.$value['euclid'].'</td>';
			
			if($i<=4):
			$div.='<td>';
			$div.='<span class="label '.$urutan[$i].'">'.$i.'</span>';
			$div.='</td>';
			else:
			$div.='<td>';
			$div.='<span class="label label-default">'.$i.'</span>';
			$div.='</td>';
			endif;
			$div.='</tr>';
			$i++;
		}
		$div.='</tbody></table>';

		return $div;
	
	}
}

/* End of file laporan.php */
/* Location: ./ */
 ?>