<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Click To Call</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class='bg-dark'> 
  <!-- Navigation-->
	<div class="row" style="margin-bottom:1%;">
    <div class="col-md-4" style="text-align:center;">
        <a class="navbar-brand" href="technicien.php" style="text-decoration:none;color:white;font-weight:bold;vertical-align:">SOLEA</a>
    </div>
	<?php 
	if(!empty($_SESSION["login"])){
		//Si l'utilisateur est un client
		if($_SESSION["rang"]==0){
			//header('Location: client.php');
			echo "<div class='col-md-4' style='text-align:center;'><a class='navbar-brand' href='client.php' style='text-decoration:none;color:white;'>Interface Client</a></div>";
		}
		//Si l'utilisateur est un technicien
		else if($_SESSION["rang"]==1){
			//header('Location: technicien.php');
			echo "<div class='col-md-4' style='text-align:center;'><a class='navbar-brand' href='technicien.php' style='text-decoration:none;color:white;'>Interface Technicien</a></div>";
		}
	}
	//Si l'utilisateur n'est pas enregistré
	else{
		echo "<div class='col-md-4' style='text-align:center;'><a class='navbar-brand' href='index.php' style='text-decoration:none;color:white;'>BIENVENUE</a></div>";
	}
		?>
	
            
            <div class="col-md-4" style='text-align:center;'>
			<?php
			if(!empty($_SESSION['login'])){
				 echo"<form method='post'><button class='btn btn-light ' name='deconnexion' style='margin-top:1%;><i class='fa fa-sign-out' aria-hidden='true'></i> Logout</button></form>";
				 }else{
					echo"<a href='login.php' style='text-decoration:none'><button class='btn btn-light' name='connexion' style='margin-top:1%;'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</button></a>";
				 }
				 
			?>
            </div>
        </div>
    </div>
<?php 
if(isset($_POST['deconnexion'])) { // si le bouton "Connexion" est appuyé
	 
			// Supression des variables de session et de la session
			$_SESSION = array();
			session_destroy();
	 
			// Supression des cookies de connexion automatique
			setcookie('login', '');
			setcookie('pass_hache', '');
			header('Location: login.php');
	 
}
?>