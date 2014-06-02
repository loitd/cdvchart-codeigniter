<html>
<head>
	<title>CDV Statistics View</title>
	<script type="text/javascript" src="js/jsapi.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<meta http-equiv="refresh" content="5">
	<script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          //url: "http://123.29.67.148:9090/index.php/chart/chartjson",
          url: "http://192.168.0.204:9090/CDVChart/index.php/chart/cdvjson",
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
	  var options = {
		  width: 1000,
		  height: 600,
		  title: 'CDV Statistics',
		  titlePosition: 'out', 
		  titleTextStyle: {fontSize: 24,textIndent: 10,color: '#FF0000'},
		  fontSize: 14,
		  vAxis: {title: 'Số Lượng'},
		  hAxis: {title: 'Services'},
		  curveType: 'none',
		  colors: ['#133AAC','#FF0000'],
		};
		
		//vAxis: {maxValue: 8, title: 'Load time in ms'},
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
	  //setInterval(drawChart, 5000);
    }

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
		<div id="chart_div"></div>
	</div>

	

	
<div id="footer">
	<h2>Cong ty CP thanh toan dien tu VNPT EPAY</h2>
	<h3>Phong He Thong. Email: <a href="mailto:hethong@vnptepay.com.vn">hethong@vnptepay.com.vn</a></h3>
</div>

</div><!--Div end wrapper-->


</body>
</html>