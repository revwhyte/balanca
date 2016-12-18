<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>Balança - YT</title>
  </head>
  <body>
	<div id ='chartDiv'></div>


    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
	<script>
	  var chartData={
	    "type":"line",  // Specify your chart type here.
	    "series":[  // Insert your series data here.
	        { "values": [35, 42, 67, 89, 42, 21, 21, 20, 12, 12, 12, 11, 11, 10, 9, 8]}
	    ]
	  };
	  zingchart.render({ // Render Method[3]
	    id:'chartDiv',
	    data:chartData,
	    height:400,
	    width:600
	  });
	</script>
  </body>
</html>
