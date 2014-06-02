<html>
<head>
	<title>CDV Statistics View 2</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/highcharts.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"/>
	<meta http-equiv="refresh" content="5">
	<script type="text/javascript">
    
    $(document).ready(function() {
    	var base_url = location.protocol + '//' + window.location.host + '/CDVChart/index.php/hchart/';
    	var json1_url = base_url + 'cdvjson_2charts';
    	var json2_url = base_url + 'cdvjson_sldh';
    	//alert(json1_url);
	    var options = {
	        chart: {
	            renderTo: 'container',
		        type: 'column' //spline
	        },
	        xAxis: {categories: ['FASTPAY-CT', 'FASTPAY-TT-TRẢ SAU' , 'VMS TRẢ TRƯỚC', 
	        						'VNP EZPAY', 'VNP TRẢ TRƯỚC', 
	        						'VTT TRẢ SAU', 'VTT TRẢ TRƯỚC']},
	        yAxis: {
	            minPadding: 0.2,
	            maxPadding: 0.2,
	            title: {
	                text: 'Value now',
	                margin: 80
	            }
	        },
	        title: {text: 'CDV Statistics'},
			subtitle: {text: 'A web of System Administrator Dept'},
            credits:{
                href    : 'http://vnptepay.com.vn',
                text    : 'SysAdmin of VNPTEPAY'
            },
            plotOptions:{
                column:{
                    dataLabels:{
                        enabled : true,
                        style: {
                            fontWeight:'bold',
                            color: '#000'
                        }
                    },
                },
            },
            legend: {
			   labelFormatter: function() {
			      var total = 0;
			      for(var i=this.yData.length; i--;) { total += this.yData[i]; };
			      return this.name + ' - Tổng: ' + total;
			   }
			},
	        series: [{},{}]
	    };

	    var options2 = {
	        chart: {
	            renderTo: 'container2',
		        type: 'column' //spline
	        },
	        xAxis: {categories: [	'VMS-10', 'VMS-20', 'VMS-50', 'VMS-100', 'VMS-200', 'VMS-500', 
	        						'VNP-10', 'VNP-20', 'VNP-50', 'VNP-100', 'VNP-200', 'VNP-500', 
	        						'VTT-10', 'VTT-20', 'VTT-50', 'VTT-100', 'VTT-200', 'VTT-500', 
	        					]},
	        yAxis: {
	            minPadding: 0.2,
	            maxPadding: 0.2,
	            title: {
	                text: 'Value now',
	                margin: 80
	            }
	        },
	        title: {text: 'CDV SLDH'},
			//subtitle: {text: 'A web of System Administrator Dept'},
            credits:{
                href    : 'http://vnptepay.com.vn',
                text    : 'SysAdmin of VNPTEPAY'
            },
            plotOptions:{
                column:{
                    dataLabels:{
                        enabled : true,
                        style: {
                            fontWeight:'bold',
                            color: '#000'
                        }
                    },
                },
            },
	        series: [{}]
	    };

	    //$.getJSON('http://192.168.0.204:9090/CDVChart/index.php/hchart/test_json', function(data) {
	    $.getJSON(json1_url + '', function(data) {
	    	//console.log("The data: " + data[0]);
	        options.series[0].name =  data[0].name;
	        options.series[0].color = data[0].color;
	        options.series[0].data =  data[0].data;

	        options.series[1].name =  data[1].name;
	        options.series[1].color = data[1].color;
	        options.series[1].data =  data[1].data;

	        var chart = new Highcharts.Chart(options);
	    });

	    $.getJSON(json2_url, function(data) {
	    	//console.log("The data: " + data[0]);
	        options2.series[0].name =  data[0].name;
	        options2.series[0].color = data[0].color;
	        options2.series[0].data =  data[0].data;

	        var chart2= new Highcharts.Chart(options2);
	    });

	});

    </script>


</head>
<body>

<div id="wrapper">
	<div id="allchart" style="align: center; width: 100%; margin: auto;">
		<!-- 
		<div id="menu">
			<ul>
				<li><a href="http://123.29.67.148:9090/">Real-time Statistics</a></li>
				<li><a href="http://123.29.67.148:9090/index.php/chart/indexvms">Real-time Statistics VMS</a></li>
				<li><a href="http://123.29.67.148:9090/index.php/chart/chartperiod">Periodic Statistics</a></li>
				<li><a href="#">About</a></li>
			</ul>
		</div>
		-->
		<!--Div that will hold the pie chart-->
		<div id="container" style="width:100%; height:400px;"></div>
		<div id="container2" style="width:100%; height:400px;"></div>
	</div>

	

	
<div id="footer">
	<h2>Cong ty CP thanh toan dien tu VNPT EPAY</h2>
	<h3>Phong He Thong. Email: <a href="mailto:hethong@vnptepay.com.vn">hethong@vnptepay.com.vn</a></h3>
</div>

</div><!--Div end wrapper-->


</body>
</html>