<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lista accesos mes</title>
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

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Descripció gràfica
    </p>
</figure>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Accessos del mes'
    },
    subtitle: {
        text: 'Per día'
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
	// Array buit per posar-hi les dades per la gràfica
	$dadesPerGrafica=array();
	// Consulta de dades agrupades per la columna data mitjançant GROUP BY. Suggereixo provar aquesta consulta
    /*Consulta a aplicar
    SELECT
    *
    FROM
        `p04usersaccess`
    WHERE
        (MONTH(NOW()) = MONTH(`date`))
        AND
        (`date` <= (NOW() + INTERVAL 30 DAY))
        AND
        (YEAR(NOW()) = YEAR(`date`))
        
        original
        
        SELECT COUNT(id) as visites, DATE(date) as data FROM $dbTabla GROUP BY DATE(date)
        
        tots els dies del mes actual
        
        SELECT COUNT(id) as visites, DATE(date) as data FROM $dbTabla WHERE (MONTH(NOW()) = MONTH(`date`)) AND
        (`date` <= (NOW() + INTERVAL 30 DAY))
        AND
        (YEAR(NOW()) = YEAR(`date`)) GROUP BY DATE(date)
    */
	$consulta = "SELECT COUNT(id) as visites, DATE(date) as data FROM $dbTabla WHERE (MONTH(NOW()) = MONTH(`date`)) AND
        (`date` <= (NOW() + INTERVAL 30 DAY))
        AND
        (YEAR(NOW()) = YEAR(`date`)) GROUP BY DATE(date)
        ";
	$result = $db->prepare($consulta); 
	$result->execute();

	if (!$result){ 
		print "<p> Error en la consulta. </p>\n";
	}else{ 
		foreach( $result as $valor){
			/*En cada iteració, afegir un item a l'array $dadesPerGrafica mitjançant push
			Cada element afegit és un array de dos elements:
			- valor pel títol de  la columna de la gràfica. En l'exemple utilitzo el valor de data
			- Valor de nombre de visites per la data concreta
			*/
			array_push($dadesPerGrafica,[$valor["data"], floatval($valor["visites"])]);			
		} 
	}
	//Cerramos conexión
	$db=NULL;
	?>
	series: [{
		name: 'Número de visitas',
        data:<?PHP
		print json_encode($dadesPerGrafica); 
		//Farcit de l'atribut data de Highcharts amb l'array de PHP. 
		//Previ a printar es converteix a la notació d'arrays de JavaScript (JSON)
		?>  
	}]
	
});
</script>
<?PHP
//Printat d'exemple per visualitzar dades en format array de PHP per Highcharts. No cal fer-lo en el resultat de la pràctica.
//print json_encode($dadesPerGrafica);
?> 
</body>
</html>