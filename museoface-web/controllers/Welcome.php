<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url')); 
    $this->load->model(array('VisiteurModel')); 
  }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function enregistrement()
	{
		$this->load->view('enregistrement');
		
	}
	
	public function ajout_visiteur()
	{
	  $pseudo=($this->input->post('pseudo'));
	  $email=($this->input->post('email'));
	  
	  $id = $this->VisiteurModel->addVisiteur($pseudo,$email);
	  
	  $this->VisiteurModel->setQueteId($id,2);
	}
	
}
