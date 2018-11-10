<?php
class VisteurModel extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->config->load('config', TRUE);
  }

	function addVisiteur($pseudo, $mail){
		$this->db->insert('visiteur', $pseudo, $mail);
		return $this->db->insert_id();
	}
	
	function getVisiteur($id){
	 $query = $this->db->get_where('visiteur', array( 'visiteur_id' => $id ));
   return $query->row();
	}
	
	function getVisiteurFromMail($mail){
	 $query = $this->db->get_where('visiteur', array('UPPER(mail)' => strtoupper(trim($mail)));
   return $query->row();
	}
	
	function getPortrait($id){
	 $query = $this->db->get_where('portrait', array('' => $id));
   return $query->row();
	}
	
	function getPortraitFromQuete($quete_id){
	 $query = $this->db->get_where('portrait', array('quete_id' => $quete_id));
   return $query->row();
	}
	
	/*
	function addContact($contact=NULL){		
		$this->db->insert('lb_contacts', $contact);
		return $this->db->insert_id();						
	}
	
	function addAbonnement($loginId){
	  $this->db->insert('lb_abonnements', array('login_id' => $loginId));
		return $this->db->insert_id();		  
	}
	
	function updateContact($id,$contact){
    $this->db->where('client_id', $id);
    $this->db->update('lb_contacts', $contact);	
	}

	function getContact($id){
    	$query = $this->db->get_where('lb_contacts', array('client_id' => $id));
    	return $query->row();
	}	
	
	function getSearchContactByNom($nom, $prenom){
    	$query = $this->db->get_where('lb_contacts', array('UPPER(nom)' => strtoupper(trim($nom)), 'UPPER(prenom)' => strtoupper(trim($prenom))));
    	return $query->row();
	}
	
	function getSearchContactByRaisonSocial($raison_social){
    	$query = $this->db->get_where('lb_contacts', array('UPPER(raison_social)' => strtoupper(trim($raison_social))));
    	return $query->row();
 	}
	
	function getContactName($id){
    	$query = $this->db
    			->select('CONCAT(UPPER(lb_contacts.nom), " ",lb_contacts.prenom) AS Nom, lb_contacts.client_id AS id')
    			->get_where('lb_contacts', array('client_id' => $id));
    	return $query->row();
	}			
	
	function getContacts(){
	$this->db->order_by('nom', 'ASC');
    $query = $this->db->get('lb_contacts');
    return  $query->result();
	}	
	
	function getContactsBeginBy($str){
	$this->db->like('nom', $str, 'after');
	$this->db->order_by('nom', 'ASC');
    $query = $this->db->get('lb_contacts');
    return  $query->result();
	}		
	
	function getPassword($email){
		$this->db->select('mdp,email,login_id');
    $query = $this->db->get_where('lb_login', array('email' => $email));
    return $query->row();
	}
	
	function getToken($login_id){
		$this->db->select('token');
    $query = $this->db->get_where('lb_login', array('login_id' => $login_id));
    
    if($query->row())
      return $query->row()->token;
    
    return Null;
	}	
	
	function getContactFromLogin($id){
    	$query = $this->db->get_where('lb_contacts_onlines', array('login_id' => $id));
    return $query->row();
	}
	
	function getCoursierFromLogin($id){
    	$query = $this->db->get_where('lb_coursiers', array('login_id' => $id));
    return $query->row();
	}	
	
	function getCurrentLoginId(){
	  return $this->getRequestValue('login_id');
	}
	
	function getCurrentCoursier(){
	  $login_id = $this->getCurrentLoginId();
	  
	  if($login_id){
	    return $this->getCoursierFromLogin($login_id);
	  }
	  
	  return Null;
	}
	
	function getCodePostaux(){
	$this->db->order_by('ville', 'ASC');
    $query = $this->db->get('lb_cp');
    return  $query->result();
	}		
	
	function getVoies(){
	$this->db->order_by('voie', 'ASC');
    $query = $this->db->get('lb_voies');
    return  $query->result();
	}	
		
	function getVille($cp_id){
    	$query = $this->db->get_where('lb_cp', array('cp_id' => $cp_id));
    	return $query->row();	
  }

	function getCpId($cp){
    	$query = $this->db->get_where('lb_cp', array('code_postal' => $cp));
    	return intval($query->row()->cp_id);	
  }
  
  private function getRequestValue($val){

	  if (isset($_REQUEST[$val]))
	    return $_REQUEST[$val];  
	  else
	    return Null;  
  
  }
  
  public function checkKey($user) {
    $ADMIN_KEY = $this->config->item('admin_key', 'config');
	  $key = $this->getRequestValue('key');
	  $login_id = $this->getRequestValue('login_id');

	  if($key == $ADMIN_KEY)
		  return $key;
   	
   	if($user && $login_id && ($key == $this->getToken($login_id)))
   	  return $key;

    return Null;
  }  
	*/
}
?>

