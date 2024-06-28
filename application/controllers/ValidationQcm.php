<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ValidationQcm extends CI_Controller {
    public function register(){
        $this->load->model('Qcm_model');
        $idService=$this->session->userdata('idservice');
        $question=$this->input->post('Question');
        $points=$this->input->post('Points');
        $idBesoin=$this->input->post('idBesoin'); 
        $idServ=$this->input->post('idService');

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $qcm=array();
            $reponses = array();
            $typeReponses = array();
            foreach ($_POST as $name => $value) {
                if (strpos($name, 'Reponse') === 0){
                    $reponses[] = $value;
                }
                if (strpos($name, 'TypeReponse') === 0){
                    $typeReponses[] = $value;
                }
            }
            for ($i=0; $i < count($reponses); $i++) { 
                $qcm[$i]= array( 
                    'idbesoinservice'=>$idBesoin,
                    'question'=>$question,
                    'points'=>$points,
                    'reponse'=>$reponses[$i], 
                    'typereponse'=>$typeReponses[$i]
                );
                $this->Qcm_model->insert_qcm($qcm[$i]); 
            }
        }     
        $idservicefarany=$this->input->post('idBesoin');
        $dataQcm=array(
            'idbesoinfarany'=>$idservicefarany,
            'idService'=>$idServ
        );
        $this->load->view('service/ajoutQcm',$dataQcm); 
    }	


    
    public function terminer(){
        $this->load->model('Qcm_model');
        $this->load->model('ProvinceService_model');
        $this->load->model('Societe_model');
        $this->load->model('Service_model');
        $this->load->model('BesoinService_model');
        $this->load->model('vue/DetailProvince_model');
        $this->load->model('vue/DetailService_model');

        $this->form_validation->set_rules('Question','Question','required|min_length[10]');
        $this->form_validation->set_rules('Points','Point','numeric|required');

            $idService=$this->input->post('idService');
            $idBesoin=$this->input->post('idBesoin'); 
            $question=$this->input->post('Question');
            $points=$this->input->post('Points');
            echo "IDBESOIN : ", $idBesoin;
        if($this->form_validation->run()){
            
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $qcm=array();
                $reponses = array();
                $typeReponses = array();
                foreach ($_POST as $name => $value) {
                    if (strpos($name, 'Reponse') === 0){
                        $reponses[] = $value;
                    }
                    if (strpos($name, 'TypeReponse') === 0){
                        $typeReponses[] = $value;
                }
            }
            for ($i=0; $i < count($reponses); $i++) { 
                $qcm[$i]= array( 
                    'idbesoinservice'=>$idBesoin,
                    'question'=>$question,
                    'points'=>$points,
                    'reponse'=>$reponses[$i], 
                    'typereponse'=>$typeReponses[$i]
                );
                $this->Qcm_model->insert_qcm($qcm[$i]); 
            }
            $allBesoin=$this->BesoinService_model->allBesoin();
            $service=$this->Service_model->Uneservice($idService);
            $data=array(
                'service'=>$service,
                'allBesoin'=>$allBesoin,
                'idserv'=>$idService
            );
            echo "Miditra base ";
            $this->load->view('headerService'); 
            $this->load->view('service/detailService',$data); 
        }      
    }else{
        echo "TSY NETY";
        $idServiceFarany=$this->DetailService_model->dernierService();
        $dataQcm=array(
            'idbesoinfarany'=>$idServiceFarany,
            'idService'=>$idService
        );
        $this->load->view('headerService'); 
        $this->load->view('service/ajoutQcm',$dataQcm); 
    }
    }
}
