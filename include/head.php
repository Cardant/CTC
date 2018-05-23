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
<body class="fixed-nav sticky-footer" id="page-top">
  
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
	}?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto" style="margin-right:2%">
			<?php 
			if(!empty($_SESSION["login"])){
				if($_SESSION["rang"]==1){ ?>
				
        <li class="nav-item" style="margin-right:2%;">
				<?php	
			$old_dispo_requete = 'SELECT * FROM worktime WHERE id_technicien="'.$_SESSION["id"].'"';
			$old_dispo_intab = $bdd->query($old_dispo_requete);
			$tech_info = $old_dispo_intab->fetch();
			$old_dispo = $tech_info['etat_disponible'];

			if($old_dispo==0){
				$old_color ="green";
				$new_dispo=1;
			}
			if($old_dispo==1){
				$old_color ="red";
				$new_dispo=0;
			}?>
			<form method="post" action="technicien.php" onsubmit='setTimeout(function(){window.location.reload();},10)'>

<button type=submit name="bouton_dispo" class="btn btn-default btn-block" style="color:white;background:<?php echo $old_color ?>;">Modifier votre disponibilité</button>
</form>
<?php
	if (isset($_POST['bouton_dispo'])) { // si le bouton "bouton_dispo" est appuyé
		
		$insert = $bdd->prepare('UPDATE worktime SET etat_disponible=:new_dispo WHERE id_technicien=:id_tech');
		$insert->bindParam(':new_dispo', $new_dispo);
		$insert->bindParam(':id_tech', $_SESSION["id"]);
		$insert->execute();
	}
	if(isset($_POST["maj"])){
		echo $_POST["state"];
		echo $_POST["commentaire"];
		echo $_POST["value_id_hidden"];

		$insert = $bdd->prepare('UPDATE `ctc_request` SET etat=:etat, commentaire=:commentaire WHERE id=:id_rqst2');
		$insert->bindParam(':commentaire', $_POST["commentaire"]);
		$insert->bindParam(':etat', $_POST["state"]);
		$insert->bindParam(':id_rqst2', $_POST["value_id_hidden"]);
		$insert->execute();
	}
?>
				</li>
				<li class="nav-item" style="margin-right:2%">
				<a href="appels.php" style="text-decoration:none;"><button type=button name="historique_appels" class="btn btn-light btn-block" style="color:black;">Historique d'appels</button></a>

				</li> <?php }} ?>
				<li class="nav-item">
					<?php
					if(!empty($_SESSION['login'])){
						echo"<form method='post'><button class='btn btn-light btn-block' name='deconnexion'><i class='fa fa-sign-out' aria-hidden='true'></i> Logout</button></form>";
					}else{
						echo"<a href='login.php' style='text-decoration:none;'><button class='btn btn-light btn-block' name='connexion'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</button></a>";
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