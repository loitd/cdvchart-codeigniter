<html>
<head>
	<title>Charging Data Statistics View</title>
	<!--Load the AJAX API
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	-->
	<script type="text/javascript" src="http://123.29.67.148:9090/js/jsapi.js"></script>
	<script type="text/javascript" src="http://123.29.67.148:9090/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://123.29.67.148:9090/css/style.css"/>
	<script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: "http://123.29.67.148:9090/index.php/chart/chartjsonvms",
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
	  var options = {
		  width: 1000,
		  height: 600,
		  title: 'Charging Data Statistics',
		  titlePosition: 'out', 
		  titleTextStyle: {fontSize: 24,textIndent: 10,color: '#FF0000'},
		  fontSize: 14,
		  vAxis: {title: 'Load time in s'},
		  hAxis: {title: 'Date and Time'},
		  curveType: 'none',
		  colors: ['#FF0000','#133AAC'],
		};
		
		//vAxis: {maxValue: 8, title: 'Load time in ms'},
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
	  setInterval(drawChart, 5000);
    }

    </script>


</head>
<body>

<div id="wrapper">
	<div id="allchart" style="align: center; width: 100%; margin: auto;">
		<div id="menu">
			<ul>
				<li><a href="http://123.29.67.148:9090/">Real-time Statistics</a></li>
				<li><a href="http://123.29.67.148:9090/index.php/chart/indexvms">Real-time Statistics VMS</a></li>
				<li><a href="http://123.29.67.148:9090/index.php/chart/chartperiod">Periodic Statistics</a></li>
				<li><a href="#">About</a></li>
			</ul>
		</div>
		<!--Div that will hold the pie chart-->
		<div id="chart_div"></div>
	</div>

	<div id="form" style="align: center; width: 100%; margin: auto;">
	<form method="post" action="">
		<span>Current period: <?php echo($current_period);?></span> mins</br>
		<span>Set period: </span><input id="period" type="text" name="period" value="<?php if (!empty($_POST)){echo($_POST['period']);} else {echo "30";}?>"/><span>mins</span>
		<input id="search" type="submit" name="search" value="Search now"/>
	</form>
	</div>

	
<div id="footer">
	<h2>Cong ty CP thanh toan dien tu VNPT EPAY</h2>
	<h3>Phong He Thong. Email: <a href="mailto:hethong@vnptepay.com.vn">hethong@vnptepay.com.vn</a></h3>
</div>

</div><!--Div end wrapper-->


</body>
</html>