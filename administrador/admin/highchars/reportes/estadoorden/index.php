<!DOCTYPE HTML>
<?php
	require_once('../../../../lib/includeLibs.php');
	
	$query = new query;
	
	$result = $query->makequery("SELECT COUNT(ESTADO) AS TOTAL,ESTADO".
				" FROM orden GROUP BY ESTADO ");
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Analisis Realizados</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
	<?php
	
	echo "$(function () {
		$('#container').highcharts({
		    chart: {
			type: 'bar'
		    },
		    title: {
			text: 'Analisis Realizados Con Frecuencia'
		    },
		    subtitle: {
			text: 'Fuente: Laboratorio HEMOLAB'
		    },
		    xAxis: {
			categories: [";
		while($temp = mysql_fetch_assoc($result))
			echo "'".estadoAEtiqueta($temp['ESTADO'])."',";
			//'Africa', 'America', 'Asia', 'Europe', 'Oceania'
			
	echo "],
	
	//
	
			title: {
			    text: 'Analisis'
			}
		    },
		    yAxis: {
			min: 0,
			title: {
			    text: 'Totates (unidades)',
			    align: 'high'
			},
			labels: {
			    overflow: 'justify'
			}
		    },
		    tooltip: {
			valueSuffix: ' unidades'
		    },
		    plotOptions: {
			bar: {
			    dataLabels: {
				enabled: true
			    }
			}
		    },
		    legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			x: -40,
			y: 100,
			floating: true,
			borderWidth: 1,
			backgroundColor: '#FFFFFF',
			shadow: true
		    },
		    credits: {
			enabled: false
		    },
		    series: [{
			name: 'Totales',
			data: [";
			
		$result = $query->makequery("SELECT COUNT(ESTADO) AS TOTAL,ESTADO".
				" FROM `orden` GROUP BY ESTADO");
		while($temp = mysql_fetch_assoc($result))
			echo $temp['TOTAL'].",";
			//107, 31, 635, 203, 2
	echo "]
		    }]
		});
	    });";
	
	function estadoAEtiqueta($estado)
	{
		if ($estado == 0)
			return "Registrado";
		if ($estado == 1)
			return "Terminado";
		if ($estado == 2)
			return "Entregado";
	}
	?>

	</script>
	</head>
	<body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 200px; margin: 0 auto"></div>

	</body>
</html>
