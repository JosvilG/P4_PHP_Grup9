<?php
include "includes/protege.php";
require_once("includes/conexion_pdo.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
	<link href="css/stickyfooter.css" rel="stylesheet">
  </head>

  <body>
	<?php
	include "includes/header.php";
	?>
	<main role="main" class="container">
	  <h2>Hola <? echo $_SESSION["name"]." ".$_SESSION["surname1"] ;?></h2>
	  <div class="starter-template">
		<h1>Bootstrap starter template</h1>
		<p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
          <form method="get" action="accessosmes.php">
                <button type="submit">Accesos mes</button>
            </form>
          <form method="get" action="accesosany.php">
                <button type="submit">Accesos any</button>
            </form>
          <form method="get" action="resumaccesos.php">
                <button type="submit">Resum accesos</button>
            </form>
	  </div>

	</main><!-- /.container -->
	<?php
	include "includes/footer.php";
	?>
</body>
</html>