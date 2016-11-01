<?php
session_start();
require_once("login/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('login/home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('login/home.php');
	}
	else
	{
		$error = "Datos Incorrecto !";
	}	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Panaderia JC</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<!--<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">-->
<link rel="stylesheet" href="css/style.css" type="text/css"  />
</head>
<body>

<div class="signin-form">

	<div class="container">
     
        
       <form name="frm" onsubmit="return ValidaDatos()" class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Inicio Sesion</h2><hr />
        
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input type="text" class="form-control" name="txt_uname_email" placeholder="Correo o Usuario" required />
            </div>
            <span id="check-e"></span>
        </div>
        

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input type="password" class="form-control" name="txt_password" placeholder="Contraseña" />
            </div>
        </div>
       
     	<hr/>
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-primary">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; Iniciar Sesion
            </button>
        </div>  
      	<br />
           <a href="login/sign-up.php">Registrate Aqui !</a>
      </form>

    </div>
    
</div>

</body>
</html>