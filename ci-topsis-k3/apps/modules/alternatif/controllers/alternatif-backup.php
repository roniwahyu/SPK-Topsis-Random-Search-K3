<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class alternatif extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','ion_auth/ion_auth'));
        $this->load->model('alternatif_model','alternatifdb',TRUE);
        $this->load->model('alat/alat_model','alatdb',TRUE);
        $this->load->model('alat_alternatif/alat_alternatif_model','alat_altdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','alternatif');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Alternatif');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'alternatif/";','embed');  
        $this->template->add_js('modules/alternatif.js');
        $this->template->add_js('modules/crud.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        // $this->template->add_css('radio.css');
        
        $this->template->load_view('contents/index',array(
                        'title'=>'Kelola Data Alternatif',
                        'subtitle'=>'Pengelolaan Alternatif',
                        'alat'=>$this->get_alat(),
                        'breadcrumb'=>array(
                            'Alternatif'),
                        ));
        
    }
     
   
    //<!-- Start Primary Key -->
    

    public function getdatatables(){
        $this->datatables->select('id_alternatif,alternatif,datetime,')
                        ->from('alternatif');
        echo $this->datatables->generate();
    }

    function get_alat(){
        // echo var_dump($this->alatdb->getall());
        return $this->alatdb->getall();

    }

    public function get($id_alternatif=null){
        if($id_alternatif!==null){
            echo json_encode($this->alternatifdb->get_one($id_alternatif));
        }
    }
    public function get_alt($id_alternatif=null){
        if($id_alternatif!==null){
            echo json_encode($this->alternatifdb->get_one($id_alternatif));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_alternatif')){
            $this->alternatifdb->update($this->input->post('id_alternatif'));
             // echo var_dump($this->input->post('alat'));
            $id_alternatif=$this->input->post('id_alternatif');
            $alat=$this->input->post('alat');
                $data=array();
                foreach ($alat as $key => $value) {
                    # code...
                    $data[]=array(
                        'id_alternatif'=>$this->input->post('id_alternatif'),
                        'id_alat'=>$value,
                        );

                }
                echo json_encode($data);
                $this->alat_altdb->delete_alat($id_alternatif);
                $this->alat_altdb->save_batch($data);
          }else{
            $this->alternatifdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_alternatif')){
                $this->alternatifdb->update($this->input->post('id_alternatif'));
                // echo var_dump($this->input->post('alat'));
                $id_alternatif=$this->input->post('id_alternatif');
                $alat=$this->input->post('alat');
                $data=array();
                foreach ($alat as $key => $value) {
                    # code...
                    $data[]=array(
                        'id_alternatif'=>$this->input->post('id_alternatif'),
                        'id_alat'=>$value,
                        );

                }
                echo json_encode($data);
                $this->alat_altdb->delete_alat($id_alternatif);
                $this->alat_altdb->save_batch($data);
                // echo $alat[0];
              }else{
                $this->alternatifdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->alternatifdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module alternatif Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
