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
		$this->enregistrement();
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
	
	
	public function verif_portrait()
	{
		$login_id = $this->session->userdata("visiteur_id");
	  $quete_id = $this->input->get('quete');
	  $v = $this->VisiteurModel->getVisiteur($login_id);
	  $p = $this->VisiteurModel->getPortraitFromQuete($v->quete_id);
	 
	  $code = $this->input->post('portrait_id');
	 
	  if ($p->portrait_id == $code){
	    $this->VisiteurModel->setPortraitId($login_id,$p->portrait_id);
	    redirect( base_url("index.php/welcome/choix_fond"));
	  }else
	    $this->valide_portrait(1);
	  
	}
	
	public function choix_fond()
	{
			$login_id = $this->session->userdata("visiteur_id");
	    $v = $this->VisiteurModel->getVisiteur($login_id);
	    if($v->portrait_id){
	      $this->load->view('choix_fond');
	    }else
	      valide_portrait($recommence=1);
	}
	
	public function valide_fond()
	{
	  $fond_id = $this->input->post('fond_id');
		$login_id = $this->session->userdata("visiteur_id");
	  $v = $this->VisiteurModel->getVisiteur($login_id);	  
	  $file_name =  "img/fond_$fond_id.jpg";
	  if(file_exists( $file_name )){
	    $this->VisiteurModel->setFondId($login_id,$fond_id);
	    $data['portrait'] = $this->VisiteurModel->getPortrait($v->portrait_id);
		  $data['pseudo'] = $v->pseudo;
		  $data['fond_id'] = $fond_id;
		  $data['email'] = $v->mail;
		  $data['img'] = $file_name;
	    $this->load->view('fin',$data);
	  }else
	    $this->choix_fond();
	  
	}
	
	public function valide_portrait($recomence=0)
	{
	  $login_id = $this->session->userdata("visiteur_id");
	  $quete_id = $this->input->get('quete');
	  $v = $this->VisiteurModel->getVisiteur($login_id);
	  $p = $this->VisiteurModel->getPortraitFromQuete($v->quete_id);
	  $data['titre'] = $p->titre;
	  $data['desc'] = $p->descriptif;
	  $data['recommence'] = $recomence;
	  
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
