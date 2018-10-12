<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class kriteria_status extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','ion_auth/ion_auth'));
        $this->load->model('kriteria_status_model','kriteria_statusdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','kriteria_status');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Kriteria_status');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'kriteria_status/";','embed');  
        $this->template->add_js('modules/kriteria_status.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('contents/index',array(
                        'title'=>'Kelola Data Kriteria_status',
                        'subtitle'=>'Pengelolaan Kriteria_status',
                        'breadcrumb'=>array(
                            'Kriteria_status'),
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
        $this->datatables->select('id_kriteriastatus,status,id_kriteria,datetime,')
                        ->from('kriteria_status');
        echo $this->datatables->generate();
    }

   

    public function get($id_kriteriastatus=null){
        if($id_kriteriastatus!==null){
            echo json_encode($this->kriteria_statusdb->get_one($id_kriteriastatus));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_kriteriastatus')){
            $this->kriteria_statusdb->update($this->input->post('id_kriteriastatus'));
          }else{
            $this->kriteria_statusdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_kriteriastatus')){
                $this->kriteria_statusdb->update($this->input->post('id_kriteriastatus'));
              }else{
                $this->kriteria_statusdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->kriteria_statusdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module kriteria_status Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
