<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class nilai_resiko extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','ion_auth/ion_auth'));
        $this->load->model('nilai_resiko_model','nilai_resikodb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','nilai_resiko');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Nilai_resiko');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'nilai_resiko/";','embed');  
        $this->template->add_js('modules/nilai_resiko.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
     
        $this->template->load_view('contents/index',array(
                        'title'=>'Kelola Data Nilai_resiko',
                        'subtitle'=>'Pengelolaan Nilai_resiko',
                        'breadcrumb'=>array(
                            'Nilai_resiko'),
                        ));
        
    }
     
  

    public function getdatatables(){
        $this->datatables->select('id_nilai_resiko,id_alternatif,id_kriteria,id_resiko,nilai_resiko,datetime,')
                        ->from('nilai_resiko');
        echo $this->datatables->generate();
    }

   

    public function get($id_nilai_resiko=null){
        if($id_nilai_resiko!==null){
            echo json_encode($this->nilai_resikodb->get_one($id_nilai_resiko));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_nilai_resiko')){
            $this->nilai_resikodb->update($this->input->post('id_nilai_resiko'));
          }else{
            $this->nilai_resikodb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_nilai_resiko')){
                $this->nilai_resikodb->update($this->input->post('id_nilai_resiko'));
              }else{
                $this->nilai_resikodb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->nilai_resikodb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module nilai_resiko Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
