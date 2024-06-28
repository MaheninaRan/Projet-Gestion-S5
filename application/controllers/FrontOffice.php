<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontOffice extends CI_Controller {
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
        $this->load->model('Genre_model'); 
        $this->load->helper('Fonction_helper');
        $this->load->model('Cv_model');
        $this->load->model('Qcm_model');

    }
    public function client(){
        $servicedetail=$this->DetailService_model->selectdetailService();
        $diplome=$this->DiplomeService_model->selectDiplomeService($idService);
        $data=array('servicedetail'=>$servicedetail,'diplome'=>$diplome); 
        $this->load->view('page/client',$data); 
    } 

    public function listeJob(){
        $teste = "s";
        $besoin=$this->BesoinService_model->allBesoinEtat("valider");
        $data=array('servicedetail'=>$besoin,'teste'=>$teste); 
        $this->load->view('header');
        $this->load->view('client/listeJob',$data);
        $this->load->view('footer');
    }
    public function cvClient(){
        $idBesoin=$_GET['idService'];
        $besoin=$this->BesoinService_model->BesoinSelectCV($idBesoin);
        $alldiplome=$this->DiplomeService_model->allDiplome();
        $allExper=$this->ExperienceService_model->allExper();
        $allSituation=$this->Situation_model->listeSituation();
        $province=$this->ProvinceService_model->selectProvinces();
        $nation=$this->NationService_model->selectNation();
        $data=array(
                    'idBesoin'=>$idBesoin,
                    'servicedetail'=>$besoin,
                    'situation'=>$allSituation,
                    'province'=>$province,
                    'nation'=>$nation,
                    'alldiplome'=>$alldiplome,
                    'allExper'=>$allExper
        );
        $this->load->view('header');
        $this->load->view('client/ajoutCv',$data);
        $this->load->view('footer');
    }

    public function listeCv(){
        $data['cv']=$this->Cv_model->selectCV();
        $this->load->view('header');
        $this->load->view('client/listCv',$data);
        $this->load->view('footer');
    }

    public function cvResultat(){  
        $pointSelect = $this->Cv_model->selectPointCv();
        $cvValider = array();
        $idPasserCvArray = array();
        for ($i=0; $i <count($pointSelect) ; $i++) { 
            if ($pointSelect[$i]['pointCv']>($pointSelect[$i]['pointBesoin'])/1.5){
                $idPasserCv=$pointSelect[$i]['id'];
                $idPasserCvArray[] = $idPasserCv;
            }
        }
        $cvValider=$this->Cv_model->selectCv_id($idPasserCvArray);        
        $this->load->view('header');
        $this->load->view('client/cvResult',array('cv' => $cvValider));
        $this->load->view('footer');
    }

   
    public function qcmExam(){
        $passwordGet=$this->input->post('password');
        $idCv=$this->input->post('idCv');
        $passwordCv=$this->Cv_model->passwordCv($idCv);
        $cvSelect=$this->Cv_model->selectCv_id($idCv);
        
        $maxQuestion=$this->Qcm_model->maxQuestionService($cvSelect[0]['idBesoin']);
        $questionService=$this->Qcm_model->distinctQuestion($cvSelect[0]['idBesoin']);
        
        
        $maxReponse=array();
        $reponse=array();
        $selectPoints=array();
        for ($i=0; $i <$maxQuestion; $i++){ 
            $maxRep=$this->Qcm_model->maxReponse($questionService[$i]['question']);
            $rep=$this->Qcm_model->selectReponse($questionService[$i]['question']);
            $selectP=$this->Qcm_model->selectPointQcm($questionService[$i]['question']);    
            $selectPoints[]=$selectP; 
            $maxReponse[] = $maxRep;
            $reponse[]=$rep;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            if($passwordGet==$passwordCv[0]['motdepasse']){
                $data=array(
                    'detailcv'=>$cvSelect,
                    'maxQuest'=>$maxQuestion,
                    'question'=>$questionService,
                    'maxReponse'=>$maxReponse,
                    'points'=>$selectPoints,
                    'reponse'=>$reponse
                );
                $this->load->view('header'); 
                $this->load->view('client/qcmExam',$data);
                $this->load->view('footer'); 
            }
            else {
                echo "Tsy afera izy zan";
            }
        }else {
            redirect('index.php/FrontOffice/qcmExam');  
        }     
        
    }

    public function insert_Reponse($data){
        $reponses = $data['reponse'];
        $idcv = $data['idcv'];
        $idbesoin = $data['idbesoin'];
        $answer=array();
        foreach ($reponses as $index => $reponse){
            foreach ($reponse as $value) {
                $insert_data = array(
                    'idcv' => $idcv,
                    'idbesoin' => $idbesoin,
                    'reponse' => $value
                );
                $val=$this->Qcm_model->selectQuestion_pour_reponse($insert_data['reponse']); 

            }
            $reponseInserena=array(
                'idcv'=>$idcv,
                'idbesoinservice'=>$val['idbesoinservice'],
                'question'=>$val['question'],
                'points'=>$val['points'],
                'reponse'=>$val['reponse'],
                'typereponse'=>$val['typereponse']
            );
            var_dump($reponseInserena);
            echo "AVANT INSERT";
            $this->Qcm_model->insert_Reponse($reponseInserena); 
            $this->Cv_model->updateEtatCv($idcv,'qcm'); 
        }
        echo "Mety";
        $this->load->view('header');
        $valiny['valiny']="Reponse qcm envoyer";
        $this->load->view('client/cvCheck',$valiny);
    }
    public function insertReponse(){
        $reponseget = $this->input->post('reponse');
        $idcv = $this->input->post('idcv');
        $maxQuest = $this->input->post('maxquestion');
        $maxReponse = $this->input->post('maxreponse');
        $idbesoin = $this->input->post('idbesoin');
        
        $data = array(
            'idcv' => $idcv,
            'idbesoin' => $idbesoin,
            'reponse' => $reponseget
        );
        $this->insert_Reponse($data);
    }

    public function resultQcm(){
        $qcmReponse['qcmreponse'] = $this->Qcm_model->selectReponseQcm(); 
        $points = $this->Qcm_model->selectPoint_QcmCv(); 
        $this->load->view('header');
        $this->load->view('client/resultatQcm',$qcmReponse);
    }

    public function Entretien(){
        $idcv=$_GET['idcvAlefa']; 
        echo $idcv;
    }
  

}

