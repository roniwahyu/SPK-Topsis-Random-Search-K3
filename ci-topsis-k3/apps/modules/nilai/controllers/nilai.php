<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class nilai extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','ion_auth/ion_auth'));
        $this->load->model('nilai_model','nilaidb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','nilai');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Nilai');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'nilai/";','embed');  
        $this->template->add_js('modules/nilai.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('contents/index',array(
                        'title'=>'Kelola Data Nilai',
                        'subtitle'=>'Pengelolaan Nilai',
                        'dosen'=>$this->nilaidb->get_drop_array('dosen','id_dosen','nama_dosen'),

                        'breadcrumb'=>array(
                            'Nilai'),
                        ));
        
    }
     
    public function ckeditor(){
        session_start();
            $_SESSION['KCFINDER']=array();
            $_SESSION['kcfinder'] = FALSE;
            $_SESSION['KCFINDER']['disabled'] = false;
            $_SESSION['KCFINDER']['uploadURL'] = "../uploads";
            // $this->template->load_view('ckeditor/admin');

    }
    //<!-- Start Primary Key -->
    

    public function getdatatables(){
        $this->datatables->select('id_nilai,id_dosen,id_kriteria,nilai,datetime,')
                        ->from('nilai');
        echo $this->datatables->generate();
    }

   

    public function get($id_nilai=null){
        if($id_nilai!==null){
            echo json_encode($this->nilaidb->get_one($id_nilai));
        }
    }
    function submit_nilai(){
        if(!empty($this->input->post('id_dosen'))):
            $kriteria=$this->input->post('id_kriteria');
            $dosen=$this->input->post('id_dosen');
            $nilai=$this->input->post('nilai');
            // echo var_dump($kriteria);
            $data=array();
            foreach ($kriteria as $key => $value) {
                # code...
                $data[]=array(
                    'id_kriteria'=>$value,
                    'nilai'=>$nilai[$key],
                    'id_dosen'=>$dosen,
                    );


            }
            // echo var_dump($data);

            $this->db->insert_batch('nilai', $data); 
        endif;
    }
    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_nilai')){
            $this->nilaidb->update($this->input->post('id_nilai'));
          }else{
            $this->nilaidb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_nilai')){
                $this->nilaidb->update($this->input->post('id_nilai'));
              }else{
                $this->nilaidb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->nilaidb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module nilai Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
