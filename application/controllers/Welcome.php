<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
		$this->load->view('header');
        $this->load->view('index');
	}	

	public function passwordCv(){
		$this->load->model('CV_model');
		$data['antsona']=$this->CV_model->passwordCv('3');
		$this->load->view('page/teste',$data);
	}

	public function teste(){
		
	}
}
