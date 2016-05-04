<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class login extends CI_Model {
 	
 	function _construct()
 	{
 		//call the Model constructor
 		parent::construct();
 	}
 	
 	/**
 	 * teste si quelconque visiteur est connecté
 	 * @return vrai ou faux
 	 */
 	
 	public function estConnecte()
 	{
 		return $this->session->userdata('iduser');
 		
 	}
 	
 public function connecter($iduser,$nom,$prenom)
 {
 	$resultat = array(
 			'iduser' => $iduser,
 			'VIS_NOM' => $nom,
 			'VIS_PRENOM' => $prenom,
 			);
 	
 	$this->session->set_userdata($resultat);
 }
 
 public function deconnecter()
 {
 	$resultat = array(
 			'VIS_NOM' => '',
 			'VIS_PRENOM' => '',
 			);
 	
 	$this->session->unset_userdata($resultat);
 	$this->session->ress_destroy();
 	
 	$this->load->helper('url');
 	redirect('/Welcome/');
 	
 }
 
 
 
 public function authentifier ($login, $mdp)
 {
 	$this->load->model('dataAccess');
 	$resultat = $this->dataAccess->getInfosVisiteur($login, $mdp);
 	
 	return $resultat;
 }
 
 }
