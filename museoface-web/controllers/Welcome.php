<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url')); 
    $this->load->library(array('session','form_validation'));
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
	
	public function choix_quete()
	{
		$this->load->view('choix_quete');
		
	}
	
	public function quete()
	{
	  $login_id = $this->session->userdata("visiteur_id");
	  $quete_id = $this->input->get('quete');
	  
	  $this->VisiteurModel->setQueteId($login_id,$quete_id);
	  redirect( base_url("index.php/welcome/valide_portrait"));
	}
	
	
	verif_portrait
	public function valide_portrait()
	{
	  $login_id = $this->session->userdata("visiteur_id");
	  $quete_id = $this->input->get('quete');
	  $v = $this->VisiteurModel->getVisiteur($login_id);
	  $p = $this->VisiteurModel->getPortraitFromQuete($v->quete_id);
	  $data['titre'] = $p->titre;
	  $data['desc'] = $p->descriptif;
	  
	  $this->load->view('valide_quete',$data);
	}
	
	public function ajout_visiteur()
	{
	  $pseudo=($this->input->post('pseudo'));
	  $email=($this->input->post('email'));
	  
	  $id = $this->VisiteurModel->addVisiteur($pseudo,$email);
	  
	  if($id){
	    $this->session->set_userdata(array('visiteur_id'  => $id));
	    redirect( base_url("index.php/welcome/choix_quete"));
	  }else
	    enregistrement();
	   
	  
	 # $this->VisiteurModel->setQueteId($id,2);
	}
	
}
