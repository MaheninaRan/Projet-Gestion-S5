<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('vue/DetailProvince_model');
        $this->load->model('vue/DetailService_model');
        $this->load->model('ProvinceService_model');
        $this->load->model('NationService_model');
        $this->load->model('Situation_model');
        $this->load->model('Service_model');
        $this->load->model('Societe_model');
        $this->load->model('DiplomeService_model');
        $this->load->model('ExperienceService_model');
        $this->load->model('BesoinService_model');
        $this->load->model('Employer_model');

    }

    function employerSelect() {
        $idService=$this->session->userdata('idservice');
        $employer=$this->Employer_model->employer($idService);
        $data=array(
            'employer'=>$employer,
            'idService'=>$idService
        );
        $this->load->view('header');
        $this->load->view('employer/employer',$data);
    }

    function allEmployer() {
        $idService=$this->session->userdata('idservice');
        $employer=$this->Employer_model->All_employer();
        $data=array(
            'employer'=>$employer,
            'idService'=>$idService
        );
        $this->load->view('header');
        $this->load->view('employer/Payment',$data);
    }

    function employerDetail(){
        $idEmployer=$_GET['idEmployer'];
        $idService=$this->session->userdata('idservice');
        $employer=$this->Employer_model->employerId($idEmployer);
        $data=array( 
            'employer'=>$employer,
            'idService'=>$idService 
        );
        $this->load->view('header');
        $this->load->view('employer/employerdetail',$data);
    }

    public function Insert_demandeConge(){
        $idEmployer = $this->input->post('idEmployer');
        $dateDebut = $this->input->post('date_debut');
        $dateFin = $this->input->post('date_fin');
        $typeConge = $this->input->post('type_conge');
        $justification = $this->input->post('justification');
        echo "dateDebut : ", $dateDebut; 
        $data = array(
            'idEmp'=>$idEmployer,
            'dateDebut'=>$dateDebut,
            'dateFin'=>$dateFin,
            'typeConge'=>$typeConge,
            'justification'=>$justification,
            'etat'=>'envoyer'
        );
        $this->Employer_model->insert_Conger($data);
    }


    function demandeConge(){
        $idService=$this->session->userdata('idservice');
        $idEmployer=$_GET['idEmp'];
        $this->load->view('header');
        $data=array( 
            'idEmployer'=>$idEmployer,
            'idService'=>$idService 
        );
        $this->load->view('employer/demandeConger',$data);
    }

    

    function heureSupplementaire(){
        $idService=$this->session->userdata('idservice');
        $idEmployer=$_GET['idEmp'];
        $employer=$this->Employer_model->employerId($idEmployer);
        $heureSupp=$this->Employer_model->heureSupplementaire($idEmployer);
        $this->load->view('header');
        $data=array( 
            'idEmployer'=>$idEmployer,
            'idService'=>$idService,
            'employer'=>$employer,
            'heure'=>$heureSupp
        );
        $this->load->view('employer/heureSupplementaire',$data);
    }

    function absence(){
        $idService=$this->session->userdata('idservice');
        $idEmployer=$_GET['idEmp'];
        $employer=$this->Employer_model->employerId($idEmployer);
        $heureSupp=$this->Employer_model->heureSupplementaire($idEmployer);
        $this->load->view('header');
        $data=array( 
            'idEmployer'=>$idEmployer,
            'idService'=>$idService,
            'employer'=>$employer,
            'heure'=>$heureSupp
        );
        $this->load->view('employer/insertAbsence',$data);
    }
    

    function InserHeureSupllementaire(){
        $idEmployer = $this->input->post('idEmployer');
        $dateDebut = $this->input->post('dates');
        $heureDebut = $this->input->post('heureDebut');
        $duree = $this->input->post('duree');
        $data = array(
            'idEmp'=>$idEmployer,
            'dates'=>$dateDebut,
            'heureDebut'=>$heureDebut,
            'heure'=>$duree
        );
        $this->Employer_model->indert_HeureSupplementaire($data);
        $employer=$this->Employer_model->employerId($idEmployer);
        $idService=$this->session->userdata('idservice');
        $congeEmployer= $this->Employer_model->congeEmployer($idEmployer);
        $heureSupp=$this->Employer_model->heureSupplementaire($idEmployer);
        $dataEnvoyer =array(
            'employer'=>$employer,
            'idService'=>$idService ,
            'conge'=>$congeEmployer,
            'heure'=>$heureSupp
        );
        $this->load->view('header');
        $this->load->view('employer/employerdetail',$dataEnvoyer);
    }

    function FichePaye(){
        $idService=$this->session->userdata('idservice');
        $employer=$this->Employer_model->All_employer();
        $data=array(
            'employer'=>$employer,
            'idService'=>$idService
        );
        $this->load->view('header');
        $this->load->view('employer/fichePaye',$data);
    }

    
    
    
}
