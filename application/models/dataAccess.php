<?php if ( ! defined('BASEPATH')) exit('No direct script allowed');

class DataAccess extends CI_Model {
	
	function _construct()
	{
		parent::_construct();
	
	}
	
	public function getInfosVisiteur($login, $mdp){
		
		$req = "select visiteur.id as id, visiteur.nom as nom, visiteur.prenom as prenom, visiteur.statut as statut
				from visiteur
				where visiteur.login? and visiteur.mdp=?";
		$rs = $this->db->query($req, array ($login, $mdp));
		$ligne = $rs->first_row('array');
		return $ligne;
		
	}
	
	public function getlistcompterendu($id){
		$req = "select RAP_BILAN, RAP_DATE, RAP_MOTIF, RAp_NUM, PRA_NUM
				from rapport_visite
				where VIS_MATRICULE = ? 
				order by RAP_DATE DESC".
				$rs = $this->db->quert($req, array ($id));
				$ligne = $rs->result-array();
				return $ligne;
	}
	
	public function getuncr($id, $rapnum)
	{
		$req = "select RAP_BILAN, RAP_DATE, RAP_MOTIF, RAp_NUM, PRA_NUM
		from rapport_visite
		where VIS_MATRICULE = '".$id."' and RAP_NUM = ".$rapnum;
		$rs = $this->db->query($req, array ($id));
		$ligne = $rs->rs->result_array();
		return $ligne;
	}
	
}
