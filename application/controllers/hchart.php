<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HChart extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','email','url'));
		$this->clientip = $_SERVER['REMOTE_ADDR'];
		
	}

	public function index()
	{
		//echo base_url();
		$this->load->view('cdvhighcharts_view', array('current_period'=>0) );
	}

	public function cdvjson_2charts()
	{
		$this->load->Model('cdv_model');
		$alldata = $this->cdv_model->getAllSample();
		$beginnum = array(
			'0'=>array(
				'name' => CHART1_LENGEND1,
				'color'=> '#133AAC', 
				'data'=>array(floatval($alldata[0]['TIME_MAX']),
					floatval($alldata[1]['TIME_MAX']),
					floatval($alldata[2]['TIME_MAX']),
					floatval($alldata[3]['TIME_MAX']),
					floatval($alldata[4]['TIME_MAX']),
					floatval($alldata[5]['TIME_MAX']),
					floatval($alldata[6]['TIME_MAX']),
					)),
			
			'1'=>array(
				'name' => CHART1_LENGEND2,
				'color'=> '#FF0000', 
				'data'=>array(floatval($alldata[0]['TIME_MIN']),
					floatval($alldata[1]['TIME_MIN']),
					floatval($alldata[2]['TIME_MIN']),
					floatval($alldata[3]['TIME_MIN']),
					floatval($alldata[4]['TIME_MIN']),
					floatval($alldata[5]['TIME_MIN']),
					floatval($alldata[6]['TIME_MIN']),
					))
		);
		
		//print_r($beginnum);
		echo json_encode($beginnum);
	}

	public function cdvjson_sldh(){
		$this->load->Model('cdv_model');
		$alldata = $this->cdv_model->getSLDH();
		//print_r($alldata);
		$beginnum = array(
			'0'=>array(
				'name' => CHART2_LENGEND1,
				'color'=> '#028C30', 
				'data'=>array(floatval($alldata[0]['SOLUONG']),
					floatval($alldata[1]['SOLUONG']),
					floatval($alldata[2]['SOLUONG']),
					floatval($alldata[3]['SOLUONG']),
					floatval($alldata[4]['SOLUONG']),
					floatval($alldata[5]['SOLUONG']),
					floatval($alldata[6]['SOLUONG']),
					floatval($alldata[7]['SOLUONG']),
					floatval($alldata[8]['SOLUONG']),
					floatval($alldata[9]['SOLUONG']),
					floatval($alldata[10]['SOLUONG']),
					floatval($alldata[11]['SOLUONG']),
					floatval($alldata[12]['SOLUONG']),
					floatval($alldata[13]['SOLUONG']),
					floatval($alldata[14]['SOLUONG']),
					floatval($alldata[15]['SOLUONG']),
					floatval($alldata[16]['SOLUONG']),
					floatval($alldata[17]['SOLUONG']),
					)
				),
		);
		
		//print_r($beginnum);
		echo json_encode($beginnum);
	}

	public function test_json()
	{
		$mytest = array(
				'0'=>array('name' => 'hane', 'color'=> '#b3b3b3', 'data'=>array(216,215,326,425)),
				'1'=>array('name' => 'hane', 'color'=> '#636363', 'data'=>array(116,225,306,455)),
				'2'=>array('name' => 'hane', 'color'=> '#b303b3', 'data'=>array(126,235,326,425)),
				'3'=>array('name' => 'hane', 'color'=> '#b303b3', 'data'=>array(136,245,126,425))
			); 
		echo json_encode($mytest);
	}




}