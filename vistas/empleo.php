<?php

	require_once("../login/session.php");
	
	require_once("../login/class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Panaderia JC</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="../css/style.css" type="text/css"  />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="../login/jquery-1.11.3-jquery.min.js"></script>
<title>Perfil - <?php print($userRow['user_email']); ?></title>

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
            <li ><a href="../vistas/quenes_somos.php">¿Quienes Somos?</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="#">Empleo</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../login/profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Perfil</a></li>
                <li><a href="../login/logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Cerrar Sesion</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
     <br><br><br>
<div class="container">
  
  <h2>Empleo</h2>

</div>

	<script src="../js/bootstrap.min.js"></script>
</body>

</html>