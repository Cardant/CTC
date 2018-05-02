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
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="technicien.php">SOLEA</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
	<?php 
	if(!empty($_SESSION["login"])){
		//Si l'utilisateur est un client
		if($_SESSION["rang"]==0){
			//header('Location: client.php');
			echo "<a class='navbar-brand' href='client.php' style='margin-left:30%;'>Interface Client</a>";
		}
		//Si l'utilisateur est un technicien
		else if($_SESSION["rang"]==1){
			//header('Location: technicien.php');
			echo "<a class='navbar-brand' href='technicien.php' style='margin-left:30%;'>Interface Technicien</a>";
		}
	}
	//Si l'utilisateur n'est pas enregistré
	else{
		echo "<a class='navbar-brand' href='technicien.php' style='margin-left:30%;'>BIENVENUE</a>";
	}
		?>
	
            

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
            <li class="nav-item">
			<?php
			if(!empty($_SESSION['login'])){
				echo"<form method='post'><button class='btn btn-light btn-block' name='deconnexion'><i class='fa fa-sign-out' aria-hidden='true'></i> Logout</button></form>";
			}else{
				echo"<a href='login.php'><button class='btn btn-light btn-block' name='connexion'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</button></a>";
				 }
				 
			?>
        </li>
      </ul>
    </div>
  </nav>
<?php 
if(isset($_POST['deconnexion'])) { // si le bouton "Connexion" est appuyé
	 
			// Supression des variables de session et de la session
			$_SESSION = array();
			session_destroy();
	 
			// Supression des cookies de connexion automatique
			setcookie('login', '');
			setcookie('pass_hache', '');
			header('Location: index.php');
	 
}
?>