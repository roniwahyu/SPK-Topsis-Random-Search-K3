<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class resiko extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','ion_auth/ion_auth'));
        $this->load->model('resiko_model','resikodb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','resiko');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Resiko');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'resiko/";','embed');  
        $this->template->add_js('modules/resiko.js');
        $this->template->add_js('modules/crud.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $kriteria=$this->resikodb->get_drop_array('kriteria','id_kriteria','nama_kriteria');
        $this->template->load_view('contents/index',array(
                        'kriteria'=>$kriteria,
                        'title'=>'Kelola Data Resiko',
                        'subtitle'=>'Pengelolaan Resiko',
                        'breadcrumb'=>array(
                            'Resiko'),
                        ));
        
    }
     
   

    public function getdatatables(){
        $this->datatables->select('id_resiko,nama_kriteria,keterangan,resiko,id_kriteria')
                        ->from('02-view-kriteria-resiko');
        
        echo $this->datatables->generate();
    }

   

    public function get($id_resiko=null){
        if($id_resiko!==null){
            echo json_encode($this->resikodb->get_one($id_resiko));
        }
        
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_resiko')){
            $this->resikodb->update($this->input->post('id_resiko'));
          }else{
            $this->resikodb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_resiko')){
                $this->resikodb->update($this->input->post('id_resiko'));
              }else{
                $this->resikodb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->resikodb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module resiko Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
