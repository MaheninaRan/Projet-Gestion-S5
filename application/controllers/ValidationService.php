<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ValidationService extends CI_Controller{
    public function register(){
        $this->load->model('ProvinceService_model');
        $this->load->model('NationService_model');
        $this->load->model('Service_model'); 
        $this->load->model('Situation_model');  
        $this->load->model('Genre_model'); 
        $this->load->model('BesoinService_model'); 
        $this->load->model('DiplomeService_model');  
        $this->load->model('ExperienceService_model'); 
        $this->load->model('vue/DetailService_model');


        $provinces=$this->ProvinceService_model->selectProvinces(); 
        $nation=$this->NationService_model->selectNation();
        $idServ =$_POST['idService'];
        $serviceConnect=$this->session->userdata('idservice');
        $anaranaService=$this->Service_model->Uneservice($idServ);
        $listeProvinces=$this->ProvinceService_model->selectProvinces(); 
        $listeNation=$this->NationService_model->selectNation();
        $listeSituation=$this->Situation_model->listeSituation();
        $dataAjouterService=array(
            'provinces'=>$provinces,
            'nation'=>$listeNation,
            'service'=>$anaranaService,
            'provinces'=>$listeProvinces,
            'situation'=>$listeSituation
        );
        $this->form_validation->set_rules('titre','titreProfil','required');
        // $this->form_validation->set_rules('nbrPers','nombre de personne','required|numeric|greater_than_equal_to[1]');
        // $tablePoint=array('agemin','agemax','ptProvinces','ptNation');
        // $table=array('Age','Age','Lieu','nationalite');
        // for ($i=0; $i < count($tablePoint); $i++) { 
        //     $this->form_validation->set_rules($tablePoint[$i],$table[$i],'required|numeric|greater_than_equal_to[0]');
        // }
        echo "Miditra validation";
        if ($this->form_validation->run()){
            $service=array(
                'idservice'=>$idServ,
                'nom'=>$this->input->post('titre'),
                'nbrperson'=>$this->input->post('nbrPers'),
                'agemin'=>$this->input->post('agemin'),
                'agemax'=>$this->input->post('agemax'),
                'etat'=>"Non lue"   
            );
            echo "Vita Besoin";  
            $this->BesoinService_model->insert_Besoin($service); 
            $idBesoinFarany=$this->DetailService_model->dernierService();
           
            $province = array (
                'idprov' => $this->input->post('lieu'),
                'idbesoinservice'=>$idBesoinFarany, 
                'points' => $this->input->post('ptProvinces')
            );
            $this->ProvinceService_model->insert_Provinces($province); 
    
            $nation = array(
                'idnation' => $this->input->post('nation'),
                'idbesoinservice'=>$idBesoinFarany, 
                'points' => $this->input->post('ptNation')
            );
            $this->NationService_model->insert_Nation($nation); 
    
            $situation = array(
                'idbesoinservice' => $idBesoinFarany, 
                'situation' => $this->input->post('situation'),
                'points'=>1
            );
            $this->Situation_model->insert_Situation($situation); 
    
            $genre = array(
                'idbesoinservice' => $idBesoinFarany, 
                'sexe'=> $this->input->post('genre'),
                'points'=>1
            );
            $this->Genre_model->insert_Genre($genre); 
    
            $diplome=array(
                'idbesoinservice'=>$idBesoinFarany,
                'idiplom' =>$this->input->post('diplome')
            );  
            $this->DiplomeService_model->insert_Diplomes($diplome); 
            
            $experience=array(
                'idbesoinservice'=>$idBesoinFarany,
                'idexper' =>$this->input->post('experience')
            );       
            $this->ExperienceService_model->insert_Experience($experience); 

            $idServiceFarany=$this->DetailService_model->dernierService();
            $dataQcm=array(
                'idbesoinfarany'=>$idServiceFarany,
                'idService'=>$idServ
            );
            $this->load->view('service/ajoutQcm',$dataQcm);
        }else{
            $this->load->view('headerService');
            $this->load->view('service/ajoutBesoin',$dataAjouterService); 
        }
    }


    public function deleteBesoin(){
	    $this->load->model('vue/DetailService_model');
        $this->load->model('Service_model');
        $this->load->model('BesoinService_model');
        $idBesoin=$this->input->post('idserviceBesoin');
        $idService=$this->input->post('idservice');
        $this->BesoinService_model->deleteBesoin($idBesoin);  
        $service=$this->Service_model->Uneservice($idService);
        $allBesoin=$this->BesoinService_model->allBesoinPourUnService($idService);
        $data=array(
           'service'=>$service,
           'allBesoin'=>$allBesoin,
           'idserv'=>$idService
        );       
	    $this->load->view('headerservice',$data);
	    $this->load->view('service/detailService',$data);
    }

   
}
?>