<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ValidationCv extends CI_Controller {
    public function insertCv(){
        $this->load->model('Cv_model');
        $this->load->model('vue/DetailProvince_model');
        $this->load->model('vue/DetailService_model');
        $this->load->model('Service_model');
        $this->load->model('BesoinService_model');         
        $this->load->model('NationService_model'); 
        $this->load->model('ProvinceService_model'); 
        $this->load->model('Situation_model'); 
        $this->load->model('Genre_model'); 
        $this->load->model('DiplomeService_model'); 
        $this->load->model('ExperienceService_model');
        $this->load->helper('Fonction_helper');
        $idBesoin=$this->input->post('idBesoin');
        $alldiplome=$this->DiplomeService_model->allDiplome();
        $province=$this->ProvinceService_model->selectProvinces();
        $nation=$this->NationService_model->selectNation();
        $allExper=$this->ExperienceService_model->allExper();

        $besoin=$this->BesoinService_model->BesoinSelectCV($idBesoin);
        $alldiplome=$this->DiplomeService_model->allDiplome();
        $allExper=$this->ExperienceService_model->allExper();
        $allSituation=$this->Situation_model->listeSituation();
        $province=$this->ProvinceService_model->selectProvinces();
        $nation=$this->NationService_model->selectNation();
        $data=array(
                    'idService'=>$idBesoin,
                    'servicedetail'=>$besoin,
                    'situation'=>$allSituation,
                    'province'=>$province,
                    'nation'=>$nation,
                    'alldiplome'=>$alldiplome,
                    'allExper'=>$allExper
            );
        
        $tablePoints=array('nom','prenom');
        $this->form_validation->set_rules('motdepasse','Mot de passe','required|min_length[5]');
        for ($i=0; $i < count($tablePoints); $i++) { 
            $this->form_validation->set_rules($tablePoints[$i],$tablePoints[$i],'required');
        }
        
        if ($this->form_validation->run()){  
            $etat="postuler";
            $dataGet=array(
                'idbesoinservice'=>$this->input->post('idBesoin'),
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'naissance' =>  $this->input->post('naissance'),
                'province' =>  $this->input->post('province'),
                'sexe' =>  $this->input->post('genre'),
                'situation' =>  $this->input->post('situation'),
                'nation' =>  $this->input->post('nation'),
                'diplome' =>  $this->input->post('diplome'),
                'experience' =>  $this->input->post('experience'),
                'motdepasse'=>$this->input->post('motdepasse'),
                'etat'=>$etat
            );
            $this->Cv_model->insert_Cv($dataGet);
            $pointBesoin=$this->BesoinService_model->get_pointBesoin($idBesoin);
            $diplomecv=$this->input->post('diplome');
            $pointDiplome=$this->DiplomeService_model->pointDiplome($diplomecv);
            $experCv=$this->input->post('experience');
            $pointsExper=$this->ExperienceService_model->pointExperience($experCv);
            
            $idcvFarany=$this->Cv_model->idCv_farany();
            $cvfarany=$this->Cv_model->selectCv_id($idcvFarany);
            if ($besoin[0]['prov']==$cvfarany[0]['province']) {
                $pointsProvince=$besoin[0]['ptprovince'];
            }else{
                $pointsProvince=0;
            }
            if ($besoin[0]['situation']==$cvfarany[0]['situation']) {
                $pointSituation=$besoin[0]['ptSit'];
            }else{
                $pointSituation=0;
            }
            if ($besoin[0]['sexe']==$cvfarany[0]['sexe']) {
                $pointSexe=$besoin[0]['ptSexe'];
            }else{
                $pointSexe=0;
            }
            if ($besoin[0]['nationalite']==$cvfarany[0]['nation']) {
                $pointNation=$besoin[0]['ptnation'];
            }else{
                $pointNation=0;
            }


            $totalPointCv=$pointDiplome+$pointsExper+$pointsProvince+$pointSituation+$pointSexe+$pointNation;

            $dataCVPoints=array(
                'idcv'=>$idcvFarany,
                'idBesoin'=>$idBesoin,
                'pointBesoin'=>$pointBesoin,
                'pointCv'=>$totalPointCv
            );
            $idcvFarany=$this->Cv_model->insert_cvPoint($dataCVPoints);
            $this->load->view('header');
            $valiny['valiny']="Cv postulé";
            $this->load->view('client/cvCheck',$valiny);
        }
        else{
            echo "tsy nety";
            $this->load->view('header');
            $this->load->view('client/ajoutCv',$data);
            $this->load->view('footer');   
        }
	}	

    public function effacerCv(){
      $this->load->model('CV_model');
      $this->load->model('DiplomeService_model');

      $passwordGet=$this->input->post('password');
      $idCv=$this->input->post('idCv');
	  $passwordCv=$this->CV_model->passwordCv($idCv);
      if ($passwordGet==$passwordCv[0]['motdepasse']){
          $this->CV_model->deteteCv($idCv);  
          $data['cv']=$this->CV_model->selectCV();
          $this->load->view('header'); 
          $this->load->view('client/listCv',$data); 
          $this->load->view('footer'); 

      }
      else {
        echo "kslm";
      }
    }
}
