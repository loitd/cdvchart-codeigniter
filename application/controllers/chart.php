<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','email'));
		$this->clientip = $_SERVER['REMOTE_ADDR'];
		
	}
	
	public function index()
	{
		//$this->load->Model('cdv_model');
		$this->load->view('cdv_view', array('current_period'=>0) );
	}

	public function cdv()
	{
		//$this->load->Model('cdv_model');
		$this->load->view('cdv_view', array('current_period'=>0) );
	}

	public function cdvjson()
	{
		$this->load->Model('cdv_model');
		//$this->chart_model->testOracleDB();
		
		$head =	array
		(
			'cols'=>array
				(
					'0'=>array('id'=>'','label'=>'NAME','pattern'=>'','type'=>'string'),
					'1'=>array('id'=>'','label'=>'SẢN LƯỢNG (triệu)','pattern'=>'','type'=>'number'),
					'2'=>array('id'=>'','label'=>'GIAO DỊCH CHỜ XỬ LÝ','pattern'=>'','type'=>'number')
				)
		);
		
		$getrows = $this->cdvjsonbody();
		$rows = array(
			'rows'=>$getrows,
		
		);
		
		$arr = array_merge($head, $rows);
		
		
		echo json_encode($arr);
	}

	public function cdvjsonbody()
	{
		$this->load->Model('cdv_model');
		$alldata = $this->cdv_model->getAllSample();
		
		$beginnum = array(
				'0'=>array(
					'c'=>array
						(
							'0'=>array('v'=>$alldata[0]['MOC'], 'f'=>null),
							'1'=>array('v'=>$alldata[0]['TIME_MAX'], 'f'=>null),
							'2'=>array('v'=>$alldata[0]['TIME_MIN'], 'f'=>null)
						)
				)
			);
		
		for ($i = 1; $i < count($alldata); $i++)
		{
			$numinrow = array(
				$i=>array(
					'c'=>array
						(
							'0'=>array('v'=>$alldata[$i]['MOC'], 'f'=>null),
							'1'=>array('v'=>$alldata[$i]['TIME_MAX'], 'f'=>null),
							'2'=>array('v'=>$alldata[$i]['TIME_MIN'], 'f'=>null)
						)
				)
			);
			
			$beginnum = array_merge($beginnum, $numinrow);
		}
		
		//print_r($beginnum);
		
		//print_r($PayCouponError);
		return $beginnum;
	}

	
	public function chartjson()
	{
		$this->load->Model('chart_model');
		$this->chart_model->testOracleDB();
		
		$head =	array
		(
			'cols'=>array
				(
					'0'=>array('id'=>'','label'=>'MOC','pattern'=>'','type'=>'string'),
					'1'=>array('id'=>'','label'=>'MAX','pattern'=>'','type'=>'number'),
					'2'=>array('id'=>'','label'=>'MIN','pattern'=>'','type'=>'number')
				)
		);
		
		$getrows = $this->testDB();
		$rows = array(
			'rows'=>$getrows,
		
		);
		
		$arr = array_merge($head, $rows);
		
		
		echo json_encode($arr);
	}
	
	public function testDB()
	{
		$this->load->Model('chart_model');
		$alldata = $this->chart_model->getNumSample($this->chart_model->getSamplePeriod());
		
		$beginnum = array(
				'0'=>array(
					'c'=>array
						(
							'0'=>array('v'=>$alldata[0]['MOC'], 'f'=>null),
							'1'=>array('v'=>$alldata[0]['TIME_MAX'], 'f'=>null),
							'2'=>array('v'=>$alldata[0]['TIME_MIN'], 'f'=>null)
						)
				)
			);
		
		for ($i = 1; $i < count($alldata); $i++)
		{
			$numinrow = array(
				$i=>array(
					'c'=>array
						(
							'0'=>array('v'=>$alldata[$i]['MOC'], 'f'=>null),
							'1'=>array('v'=>$alldata[$i]['TIME_MAX'], 'f'=>null),
							'2'=>array('v'=>$alldata[$i]['TIME_MIN'], 'f'=>null)
						)
				)
			);
			
			$beginnum = array_merge($beginnum, $numinrow);
		}
		
		//print_r($beginnum);
		
		//print_r($PayCouponError);
		return $beginnum;
	}
	
	public function chartperiod()
	{
		if ( isset( $_POST['search'] ) ){
			$fromDate = $this->input->post('fromDate');
			$toDate = $this->input->post('toDate');
			
		}
		$this->load->view('chart_view_2');
	
	}
	
	
	/*----------------------------------VMS-------------------------------------*/
	//for VMS
	public function indexvms()
	{
		$this->load->Model('chart_vms_model');
		
		if ( isset( $_POST['search'] ) ){
			$period = $this->input->post('period');
			$this->chart_vms_model->setSamplePeriod($period);
		}
		$this->load->view('chart_vms_view', array('current_period'=>$this->chart_vms_model->getSamplePeriod()) );
	}
	
	
	public function chartjsonvms()
	{
		$this->load->Model('chart_vms_model');
		$this->chart_vms_model->testOracleDB();
		
		$head =	array
		(
			'cols'=>array
				(
					'0'=>array('id'=>'','label'=>'MOC','pattern'=>'','type'=>'string'),
					'1'=>array('id'=>'','label'=>'MAX','pattern'=>'','type'=>'number'),
					'2'=>array('id'=>'','label'=>'MIN','pattern'=>'','type'=>'number')
				)
		);
		
		$getrows = $this->testDBvms();
		$rows = array(
			'rows'=>$getrows,
		
		);
		
		$arr = array_merge($head, $rows);
		
		
		echo json_encode($arr);
	}
	
	public function testDBvms()
	{
		$this->load->Model('chart_vms_model');
		$alldata = $this->chart_vms_model->getNumSample($this->chart_vms_model->getSamplePeriod());
		
		$beginnum = array(
				'0'=>array(
					'c'=>array
						(
							'0'=>array('v'=>$alldata[0]['MOC'], 'f'=>null),
							'1'=>array('v'=>$alldata[0]['TIME_MAX'], 'f'=>null),
							'2'=>array('v'=>$alldata[0]['TIME_MIN'], 'f'=>null)
						)
				)
			);
		
		for ($i = 1; $i < count($alldata); $i++)
		{
			$numinrow = array(
				$i=>array(
					'c'=>array
						(
							'0'=>array('v'=>$alldata[$i]['MOC'], 'f'=>null),
							'1'=>array('v'=>$alldata[$i]['TIME_MAX'], 'f'=>null),
							'2'=>array('v'=>$alldata[$i]['TIME_MIN'], 'f'=>null)
						)
				)
			);
			
			$beginnum = array_merge($beginnum, $numinrow);
		}
		
		//print_r($beginnum);
		
		//print_r($PayCouponError);
		return $beginnum;
	}
	
	/*----------------------------------------------JSON for new Chart-------------------------------------------------------*/
	public function newjson(){
		$this->load->Model('chart_model');
		$alldata = $this->chart_model->getNumSample($this->chart_model->getSamplePeriod());
		$begindat = array( 
			array(
				'0'=>$alldata[0]['MOC'],
				'1'=>$alldata[0]['TIME_MIN'],
			),
		);
		for ($i = 1; $i < count($alldata); $i++)
		{
			$mindat = array(
				array(
					'0'=>$alldata[$i]['MOC'],
					'1'=>$alldata[$i]['TIME_MIN'],
				),
			);
			$begindat = array_merge($begindat, $mindat);
		}
		
		$begindat = array(
			"label"=>"MINI",
			"data"=>$begindat,
		);
		echo json_encode($begindat, JSON_NUMERIC_CHECK);

		//echo json_encode($begindat); 
	}
	
	public function simplejson(){
		$tessss = '[{
					"name": "Revenue",
					"data": [23987, 24784, 25899, 25569, 25897, 25668, 24114, 23899, 24987, 25111, 25899, 23221]
					}, {
					"name": "Overhead",
					"data": [21990, 22365, 21987, 22369, 22558, 22987, 23521, 23003, 22756, 23112, 22987, 22897]
					}]';
		echo $tessss;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}