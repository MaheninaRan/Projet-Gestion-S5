<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RH extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('vue/DetailProvince_model');
        $this->load->model('vue/DetailService_model');
        $this->load->model('ProvinceService_model');
        $this->load->model('NationService_model');
        $this->load->model('Situation_model');
        $this->load->model('Service_model');
        $this->load->model('Societe_model');
        $this->load->model('BesoinService_model');
    }

	public function listeBesoinCondition(){
        $etat=$_GET['etat'];
        $idservice=$_GET['idservice']; 
        $service=$this->Service_model->Uneservice($idservice);
        echo $etat;
        $besoinCondition=$this->BesoinService_model->allBesoinEtat($etat);
        $data=array(
            'allBesoin'=>$besoinCondition,
            'service'=>$service
        );
        $this->load->view('headerservice');
        $this->load->view('service/detailBesoinValider',$data);
    }

    public function ValidationService(){
        $idservice=$_GET['idservice']; 
        $idbesoin=$_GET['idbesoin']; 
        $etat=$_GET['etat']; 
        $this->BesoinService_model->updateEtatBesoin($idbesoin,$etat);
        $allBesoin=$this->BesoinService_model->allBesoinEtat("non lue");
        $service=$this->Service_model->Uneservice($idservice);
        $data=array(
            'allBesoin'=>$allBesoin,
            'service'=>$service
        );
        $this->load->view('headerservice');
        $this->load->view('service/detailRH',$data);

    }

    public function listeDemande(){
        $idservice=$_GET['idservice']; 
        $allBesoin=$this->BesoinService_model->allBesoinEtat("non lue");
        $service=$this->Service_model->Uneservice($idservice);
        $dataRH=array(
            'allBesoin'=>$allBesoin,
            'service'=>$service
        );    
        $this->load->view('headerService');
        $this->load->view('service/detailRH',$dataRH);
    }
    
}
  
