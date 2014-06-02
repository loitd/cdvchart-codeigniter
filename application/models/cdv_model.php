<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * send mail via gmail
 * */
class cdv_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
        //$this->load->library(array('database'));
        $this->load->database();
		//$this->db_vms = $this->load->database('vms', TRUE);
    }

    public function getAllSample()
	{
		$query = "
			select NAME as MOC, SANLUONG as TIME_MAX, SOLUONG as TIME_MIN from CDV_BIEUDO_DH order by NAME asc
			";

		$result = $this->db->query($query);
		$result = $result->result_array();
		//print_r($result);
		return $result;
		
	}

	public function getSLDH()
	{
		$query = "
			select menhgia, SOLUONG FROM CDV_BIEUDO_SLDH order by TELCO asc, CAST(MENHGIA AS INT) asc
		";

		$result = $this->db->query($query);
		$result = $result->result_array();
		//print_r($result);
		return $result;
	}


}