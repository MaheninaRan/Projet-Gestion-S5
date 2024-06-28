<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(Type $var = null) {
        parent::__construct();
        $this->load->model('Societe_model');
        $this->load->model('Service_model');
    }
    public function connexion(){
        $sessionAdmin=$this->session->userdata('id');
        if (isset($sessionAdmin)) {
            $detailService['servicedetail']=$this->Service_model->detailService();
            $this->load->view('service/liste',$detailService);
        }
        else{ 
            $email=$this->input->post('email');
            $motdepasse=$this->input->post('password');
            $valiny=$this->Societe_model->get_admin($email,$motdepasse); 
            if ($valiny==false){
                echo "diso leizy";
            }else{
                echo "mety";
                var_dump($valiny);
                $this->session->set_userdata('id',$valiny);
                $idSociete['idsociete']= $this->session->userdata('id');
                $detailService['servicedetail']=$this->Service_model->detailService();
                $this->load->view('service/liste',$detailService);
            }
        }
	}
    public function ajoutService(){
        $this->load->view('service/ajoutService'); 
    }

    public function insertService(){
        $this->load->model('Service_model');
 	    $this->load->model('vue/DetailService_model');
        $servicedetail['servicedetail']=$this->DetailService_model->selectdetailService();
	    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        	$data=array(
			'idsociete'=> $this->session->userdata('id'),
			'nom' => $this->input->post('nomService'),
			'nomresponsable' => $this->input->post('responsable'),
			'email' => $this->input->post('email'),
			'motdepasse' => $this->input->post('motdepasse')
		    );
		$this->Service_model->insert_Services($data);
	    }
	    $this->load->view('service/liste',$servicedetail);
    }

    public function deleteService(){
	    $this->load->model('vue/DetailService_model');
        $this->load->model('Service_model');
        $this->load->model('BesoinService_model');
        $idservice=$this->input->post('idservice');
        $this->Service_model->deleteService($idservice);  
        $detailService['servicedetail']=$this->Service_model->detailService();
        $this->load->view('service/liste',$detailService);
    }
    public function deconnexion(){
        $this->session->sess_destroy();
        $this->load->view('header');
        $this->load->view('service/indexService');
    }
}
