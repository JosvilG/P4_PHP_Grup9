<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lista accesos any</title>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<?
require_once("includes/conexion_pdo.php");
?>
<body>
<?
$db = new Conexion();
$dbTabla='p04usersaccess';

?>

<form method="get" action="mainpage.php">
                <button type="submit">Tornar al inici</button>
            </form>


    <div id="chartA" class="chart"></div>
    <p class="highcharts-description">
        Descripció gràfica
    </p>
    <div id="chartB" class="chart"></div>

<script>

Highcharts.chart('chartA', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Accessos del any actual'
    },
    subtitle: {
        text: 'Per mes'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Num daccesos'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
	<?PHP
	$dadesPerGrafica=array();
	$consulta = "SELECT COUNT(id) as visites, DATE(date) as data, MONTH(date) as mes FROM $dbTabla WHERE
    YEAR(date) = YEAR(CURDATE())
GROUP BY EXTRACT(YEAR_MONTH FROM date)
        ";
	$result = $db->prepare($consulta); 
	$result->execute();

	if (!$result){ 
		print "<p> Error en la consulta. </p>\n";
	}else{ 
		foreach( $result as $valor){
			
			array_push($dadesPerGrafica,[$valor["mes"], floatval($valor["visites"])]);			
		} 
	}
    
	//Cerramos conexión
	
	?>
    
	series: [{
		name: 'Número de visitas',
        data:<?PHP
		print json_encode($dadesPerGrafica); 
		?>  
	}]
});
    
            
</script>
<script>
Highcharts.chart('chartB', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Accessos del any anterior'
    },
    subtitle: {
        text: 'Per mes'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Num daccesos'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    <?PHP
	$dadesPerGrafica1=array();
	$consulta1 = "SELECT COUNT(id) as visites, DATE(date) as data, MONTH(date) as mes FROM $dbTabla WHERE
    YEAR(date) = YEAR(DATE_SUB(CURDATE(),INTERVAL 1 YEAR))
GROUP BY EXTRACT(YEAR_MONTH FROM date)
        ";
	$result1 = $db->prepare($consulta1); 
	$result1->execute();

	if (!$result1){ 
		print "<p> Error en la consulta. </p>\n";
	}else{ 
		foreach( $result1 as $valor1){
			
			array_push($dadesPerGrafica1,[$valor1["mes"], floatval($valor1["visites"])]);			
		} 
	}
    
   
    
	//Cerramos conexión
	
	?>
    
	series: [{
		name: 'Número de visitas',
        data:<?PHP
		print json_encode($dadesPerGrafica1); 
		?>  
	}]
});    
</script>
    
</body>
    <?$db=NULL;?>
</html>