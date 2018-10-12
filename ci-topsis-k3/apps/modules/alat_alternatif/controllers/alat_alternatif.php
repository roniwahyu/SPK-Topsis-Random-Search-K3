<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class alat_alternatif extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','ion_auth/ion_auth'));
        $this->load->model('alat_alternatif_model','alat_alternatifdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','alat_alternatif');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Alat_alternatif');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'alat_alternatif/";','embed');  
        $this->template->add_js('modules/alat_alternatif.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->template->load_view('contents/index',array(
                        'title'=>'Kelola Data Alat_alternatif',
                        'subtitle'=>'Pengelolaan Alat_alternatif',
                        'breadcrumb'=>array(
                            'Alat_alternatif'),
                        ));
        
    }
     
    
    //<!-- Start Primary Key -->
    

    public function getdatatables(){
        $this->datatables->select('alat_alt_id,id_alat,id_alternatif,datetime,')
                        ->from('alat_alternatif');
        echo $this->datatables->generate();
    }

   

    public function get($alat_alt_id=null){
        if($alat_alt_id!==null){
            echo json_encode($this->alat_alternatifdb->get_one($alat_alt_id));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('alat_alt_id')){
            $this->alat_alternatifdb->update($this->input->post('alat_alt_id'));
          }else{
            $this->alat_alternatifdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('alat_alt_id')){
                $this->alat_alternatifdb->update($this->input->post('alat_alt_id'));
              }else{
                $this->alat_alternatifdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->alat_alternatifdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module alat_alternatif Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
