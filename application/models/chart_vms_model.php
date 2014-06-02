<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * send mail via gmail
 * */
class chart_vms_model extends CI_Model
{
	public $db_vms;

	function __construct()
    {
        parent::__construct();
        
		$this->db_vms = $this->load->database('vms', TRUE);
    }
	
	public function testOracleDB()
    {
		$query = "
			select ID, to_char(MOC,'HH:MI:SS') as DATETIME, TIME_MAX, TIME_MIN from SOLIEU";

		$result = $this->db_vms->query($query);
		$result = $result->result_array();
		//print_r($result);
		return $result;
    }
	
	public function getNumSample($min)
	{
		$query = "
			select ID, to_char(MOC,'HH:MI:SS') as MOC, TIME_MAX, TIME_MIN from SOLIEU where 
			24*(SYSDATE - MOC) <= '" . $min/60 . "'
			order by ID asc
			";

		$result = $this->db_vms->query($query);
		$result = $result->result_array();
		//print_r($result);
		return $result;
		
	}
	
	public function getSamplePeriod()
	{
		$query = "
			select VALUE from WEBTK_CONFIG
			where PARAMS = 'SAMPLE_PERIOD'";

		$result = $this->db_vms->query($query);
		$result = $result->result_array();
		//print_r($result);
		return $result[0]['VALUE'];
		
	}
	
	public function setSamplePeriod($min)
	{
		$query = "
			update WEBTK_CONFIG
			set VALUE = '" . $min . "'
			where PARAMS = 'SAMPLE_PERIOD'";
		$this->db_vms->trans_start();
		$result = $this->db_vms->query($query);
		//$result = $result->result_array();
		if ($this->db_vms->trans_status() === FALSE)
		{
			$this->db_vms->trans_rollback();
		}
		else
		{
			$this->db_vms->trans_commit();
		}
		
		//print_r($result);
		//return $result[0]['VALUE'];
		
	}
	
	//
	
	
	
	
}