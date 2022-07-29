<?PHP
	$mail = $_POST["email"];
	$pas = $_POST["pass"];
	require_once("includes/conexion_pdo.php");
	// Creamos el objeto 
	$db = new Conexion();
	
	$dbTabla='p04users';
    $dbTabla2='p04usersaccess';

    

	$consulta = "SELECT COUNT(*) FROM $dbTabla WHERE email=:log AND password=:pas AND blockeduser=0"; 
	$result = $db->prepare($consulta);
	$result->execute(array(":log" => $mail, ":pas" => $pas));
	$total = $result->fetchColumn();

//header("location:mainpage.php");
	if($total==1){
            
			$consulta = "SELECT * FROM $dbTabla WHERE email=:log AND password=:pas AND blockeduser=0"; 
			$result = $db->prepare($consulta);
			$result->execute(array(":log" => $mail, ":pas" => $pas));
			
			if (!$result) { 
				print "<p>Error en la consulta.</p>\n";
				//header("location:index.php");
			}else{
				session_start();
				$fila=$result->fetchObject();
				
				$_SESSION["userid"] = $fila->id;
				$_SESSION["name"] = $fila->name;
				$_SESSION["surname1"] = $fila->surname1;
				$_SESSION["surname2"] = $fila->surname2;
				$_SESSION["profile"] = $fila->profile;
                $ip = $_SERVER['REMOTE_ADDR'];
                $date=date("Y-m-d H:i:s");
                $pais = @json_decode(file_get_contents( 
                    "http://www.geoplugin.net/json.gp?ip=" . $ip));
                $userid1 = $_SESSION["userid"];
                $pais =  ''.$pais->geoplugin_countryName.'';
                $consulta1 = "INSERT INTO $dbTabla2 (ip,date,pais,userid) VALUES('$ip','$date','$pais','$userid1')";
                $result1 = $db->prepare($consulta1);
			    $result1->execute();
               
                header("location:mainpage.php");
			}
	}else{
		header("location:index.php");
	}
	
?>