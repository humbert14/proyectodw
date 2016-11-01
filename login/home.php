<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8" />
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="../css/style.css" type="text/css"  />
<title>Panaderia JC - <?php print($userRow['user_email']); ?></title>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Panaderia JC</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="#"><a href="#">¿Quienes Somos?</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="#">Empleo</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Perfil</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Cerrar Secion</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="clearfix"></div>
        
    <div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    
    	<hr />
        
        
        <a href="home.php"><span class="glyphicon glyphicon-home"></span> Inicio</a> &nbsp; 
        <a href="profile.php"><span class="glyphicon glyphicon-user"></span> Perfil</a>
       	<hr />
        
        <p class="h4">Pagina de inicio</p> 

        <div class="col-md-offset-3">
        <a href="#"><img class="trabajador" src="../img/ventas.png" alt=""></a>
        <a href="../crud/index.php"><img class="trabajador" src="../img/trabajadores.png" alt="trabajadores"></a>
        <a href="#"><img class="trabajador" src="../img/vendedores.png" alt=""></a>
        </div>

    </div>

</div>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>