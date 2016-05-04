<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Control extends CI_Controller {
	
	public function index()
	{
		$this->load->model('Login');
		
		if (!$this->Login->estConnecte())
		{
			$data = array();
			$this->load->view('connexion',$data);
		}
		else
		{
			$this->load->viewhelper('url');
			redirect('/welcome/');
		}
	
		$this->load->view('v-charte', $data);
	}
	
	public function login()
	{
		$this->load->model('Login');
	
		$login = $this->input->post('Login');
		$mdp = $this->input->post('Mdp');
		$resultat = $this->Login->connect($login,$mdp);
	
		if (empty($resultat))
		{
			$data= array('erreur'=> 'Login ou mot de passe incorect');
			$this->load->view('connexion',$data);
		}
		else
		{
			$this->Login->connecter($resultat['VIS_NOM'], $resultat['VIS_PRENOM']);
			$this->index();
		}
	
	
		
	}
}