<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackOffice extends CI_Controller {
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
        $this->load->model('DiplomeService_model');
        $this->load->model('ExperienceService_model');
        $this->load->model('BesoinService_model');
        $this->load->model('Employer_model');

    }

    public function service(){
        $servicedetail=$this->DetailService_model->selectdetailService();
        $teste="dq";
        $data=array('servicedetail'=>$servicedetail,'teste'=>$teste); 
        $this->load->view('service/liste',$data); 
    } 
    public function testeReact(){
        $servicedetail=$this->DetailService_model->selectdetailService();
        echo json_encode($servicedetail);
    }
    
    public function BesoinService(){
        $idService=$_GET['idService'];
        $provinces=$this->ProvinceService_model->selectProvinces(); 
        $nation=$this->NationService_model->selectNation();
        $idconnectService = $this->session->userdata('idservice');
        $serviceConnect=$this->Service_model->Uneservice($idService);
        $diplome=$this->DiplomeService_model->allDiplome();
        $situation=$this->Situation_model->listeSituation();
        $experience=$this->ExperienceService_model->allExper();
        $data=array(
            'provinces'=>$provinces,
            'nation'=>$nation,
            'situation'=>$situation,
            'service'=>$serviceConnect,
            'idservice'=>$idService,
            'diplome'=>$diplome ,
            'experience'=>$experience
        );
        $this->load->view('headerService'); 
        $this->load->view('service/ajoutBesoin',$data); 
    }

   
    public function ajoutQcm(){
        $this->load->view('service/ajoutQcm'); 
    } 
    public function pageService(){
        $this->load->view('header');
        $this->load->view('service/indexService'); 
    } 
    
    public function autreQuestion(){
        $idServiceFarany['idservicefarany']=$this->input->post('idService'); 
        $this->load->view('service/ajoutQcm',$idServiceFarany); 
    } 

     public function connexionService(){ 
        $email=$this->input->post('email');
        $motdepasse=$this->input->post('password');
        echo "EMAIL__MIDITRA : ", $email;
        echo "MDP__MIDITRA : ", $motdepasse;

        $valiny=$this->Service_model->connexionService($email,$motdepasse); 
        echo "VAR_DUMP : ", var_dump($valiny);
        if ($valiny==false){
            echo "diso leizy";
        }else{
	     $this->session->set_userdata('idservice',$valiny);
         $idService=$this->session->userdata('idservice');
         $service=$this->Service_model->Uneservice($idService);
         $allBesoin=$this->BesoinService_model->allBesoinPourUnService($idService);
         $data=array(
            'service'=>$service,
            'allBesoin'=>$allBesoin,
            'idserv'=>$idService
         );       
        if ($service[0]['services']=="RH"){
            $allBesoin=$this->BesoinService_model->allBesoinEtat("non lue");
            $dataRH=array(
                'allBesoin'=>$allBesoin,
                'service'=>$service
            );    
            $this->load->view('headerService');
            $this->load->view('service/detailRH',$dataRH);
        }else{
                $this->load->view('headerService');
                $this->load->view('service/detailService',$data);
        }
        }
    }
    
    public function listeBesoinCondition(){
        $etat=$_GET['etat'];
        $idservice=$_GET['idservice']; 
        $service=$this->Service_model->Uneservice($idservice);
        $besoinCondition=$this->BesoinService_model->besoinEtat($idservice,$etat);
        echo "ETAT TTT :  " , $etat;
        $data=array(
            'allBesoin'=>$besoinCondition,
            'service'=>$service
        );
        $this->load->view('headerservice');
        $this->load->view('service/besoinCondition',$data);
    }

    public function listeAllBesoin(){
        $idservice=$_GET['idservice']; 
        $service=$this->Service_model->Uneservice($idservice);
        $besoinCondition=$this->BesoinService_model->allBesoinPourUnService($idservice);
        
        $data=array(
            'allBesoin'=>$besoinCondition,
            'service'=>$service
        );
        $this->load->view('headerservice');
        $this->load->view('service/detailService',$data);
    }

	public function deconnexionService(){
        $this->session->sess_destroy();
        $this->load->view('header');
        $this->load->view('service/indexService');
    }

    function employerSelect() {
        $idService=$this->session->userdata('idservice');
        
        $employer=$this->Employer_model->employer($idService);
        var_dump($idService);
        $data=array(
            'employer'=>$employer,
            'idService'=>$idService
        );
        $this->load->view('header');
        $this->load->view('employer/employer',$data);
    }
    
    function employerDetail(){
        $idEmployer=$_GET['idEmployer'];
        $idService=$this->session->userdata('idservice');
        $employer=$this->Employer_model->employerId($idEmployer);
        $congeEmployer= $this->Employer_model->congeEmployer($idEmployer);
        $heureSupp=$this->Employer_model->heureSupplementaire($idEmployer);
        $data=array( 
            'employer'=>$employer,
            'idService'=>$idService,
            'conge'=>$congeEmployer,
            'heure'=>$heureSupp 
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
        $employer=$this->Employer_model->employerId($idEmployer);
        $idService=$this->session->userdata('idservice');

        $dataInsert = array(
            'idEmp'=>$idEmployer,
            'dateDebut'=>$dateDebut,
            'dateFin'=>$dateFin,
            'typeConge'=>$typeConge,
            'justification'=>$justification,
            'etat'=>'envoyer'
        );
        echo "AVANT INSERTION";
        $this->Employer_model->insert_Conger($dataInsert);
        var_dump($dataInsert);
        $congeEmployer= $this->Employer_model->congeEmployer($idEmployer);
        $dataEnvoyer =array(
            'employer'=>$employer,
            'idService'=>$idService ,
            'conge'=>$congeEmployer
        );
        $this->load->view('header');
        $this->load->view('employer/employerdetail',$dataEnvoyer);

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

    public function listeBesoinCondition_RH(){
        $etat=$_GET['etat'];
        $idservice=$_GET['idservice']; 
        $service=$this->Service_model->Uneservice($idservice);
        echo "ETAT : ",  $etat;
        $besoinCondition=$this->BesoinService_model->allBesoinEtat($etat);
        $data=array(
            'allBesoin'=>$besoinCondition,
            'service'=>$service
        );
        $this->load->view('headerservice');
        $this->load->view('service/detailBesoinValider_RH',$data);
    }

    function demandeConge_RH(){
        $idService=$this->session->userdata('idservice');
        $service=$this->Service_model->Uneservice($idService);
        $conge=$this->Employer_model->congeEtat('envoyer');
        $data=array(
            'service'=>$service,
            'conge'=>$conge
        );
        $this->load->view('headerservice');
        $this->load->view('service/demandeConge_RH',$data);   
    }

    public function listeAllBesoin_RH(){
        $idservice=$_GET['idservice']; 
        $service=$this->Service_model->Uneservice($idservice);
        $besoinCondition=$this->BesoinService_model->allBesoin();
        
        $data=array(
            'allBesoin'=>$besoinCondition,
            'service'=>$service
        );
        $this->load->view('headerservice');
        $this->load->view('service/detailService',$data);
    }

    function changeDemande_Valider(){
        $idconge=$_GET['idConge']; 
        $idService=$this->session->userdata('idservice');
        $service=$this->Service_model->Uneservice($idService);
        echo "IDCONGE : " , $idconge;
        $this->Employer_model->changeEtat_Conge($idconge,'valider');
        echo "APRES ECHANGE";

        $conge=$this->Employer_model->congeEtat('envoyer');
        $data=array(
            'service'=>$service,
            'conge'=>$conge
        );
        $this->load->view('headerservice');
        $this->load->view('service/demandeConge_RH',$data); 
    }

    

    function changeDemande_Refuser(){
        $idservice=$_GET['idConge']; 
        $idService=$this->session->userdata('idservice');
        $service=$this->Service_model->Uneservice($idService);
        $this->Employer_model->changeEtat_Conge($idservice,'refuser');
        $conge=$this->Employer_model->congeEtat('envoyer');
        $data=array(
            'service'=>$service,
            'conge'=>$conge
        );
        $this->load->view('headerservice');
        $this->load->view('service/demandeConge_RH',$data); 
    }
    
    function Payement(){
        $idservice=$_GET['idservice']; 
        $idService=$this->session->userdata('idservice');
        $service=$this->Service_model->Uneservice($idService);
        $this->Employer_model->changeEtat_Conge($idservice,'refuser');
        $conge=$this->Employer_model->congeEtat('envoyer');
        $data=array(
            'service'=>$service,
            'conge'=>$conge
        );
        $this->load->view('headerservice');
        $this->load->view('service/Payment',$data); 
    }
    

}
