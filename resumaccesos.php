
<form method="get" action="mainpage.php">
                <button type="submit">Tornar al inici</button>
            </form>
<center>
    <h1>Accessos d'avui</h1>

<?PHP
	require_once("includes/conexion_pdo.php");
	// Creamos el objeto 
	$db = new Conexion();
	
$dbTabla='p04usersaccess';


$consulta = "SELECT $dbTabla.ip, $dbTabla.date, $dbTabla.userid FROM $dbTabla WHERE DATE($dbTabla.date) = CURDATE()";
$result = $db->prepare($consulta);
$result->execute();

			if (!$result) { 
				print "<p>Error en la consulta.</p>\n";
				//header("location:index.php");
			}else{
				//session_start();

                $pais = @json_decode(file_get_contents( 
                    "http://www.geoplugin.net/json.gp?ip=" . $ip));
                $pais =  ''.$pais->geoplugin_countryName.'';
                print "<table border=1>";
                    print "<tr>";
                            print "<th>IP</th>";
                            print "<th>DATA</th>";
                            print "<th>PAIS</th>";
                    print "</tr>";
            foreach( $result as $valor){
                
                    
                    print "<tr>";
                            print "<td>".$valor["ip"]."</td><br>";
                            print "<td>".$valor["date"]."</td>";
                            print "<td>".$pais."</td>";
                    print "</tr>";
                
                }
                print "</table>";
			}
	
$db=NULL;

?>
</center>