<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('login');
		$this->load->helper('form');
		if (!$this->login->estConnecte())
		
			{
				
				$data = array();
				$this->load->view('connexion',$data);
			}
			else
			{
				
				$this->load->view('welcome_message.php');
				//redirect('/welcome/');
			}
		
		/**if (!$this->login->estConnecte())
		{
			$data = array();
			$this->load->view('connexion',$data);
		}
		else
		{
			$this->load->view('welcome_message.php');
			//redirect('/welcome/');
		}
	*/
		//$this->load->view('v-charte', $data);
	}
	
	public function login()
	{
		//print_r('bklm');
		//die();
		$this->load->model('login');
		$login = $this->input->post('login');
		$mdp = $this->input->post('mdp');
		$resultat = $this->login->authentifier($login,$mdp);
	
		if (empty($resultat))
		{
			$data= array('erreur'=> 'login ou mot de passe incorect');
			$this->load->view('connexion',$data);
		}
		else
		{
			//$this->login->connecter( $resultat['VIS_MATRICULE'],$resultat['VIS_NOM'], $resultat['VIS_PRENOM']);
			$this->login->connecter( $resultat['id'],$resultat['nom'], $resultat['prenom']);
			$this->index();
		}
	
	
	
	} 
	public function deconnecter()
	{
		$this->session->sess_destroy();
		$this->load->view('connexion');
	}
}
