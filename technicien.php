<?php
session_start();

require 'pdo.php';
// Connexion à la base de données
$bdd = new PDO('mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd . ';charset=utf8', $PARAM_utilisateur, $PARAM_mot_passe);

// Condition pour afficher la page : être technicien Sinon redirection vers la page de connexion
if (!empty($_SESSION['login'])) {

    if ($_SESSION["rang"] == 0) {
        header('Location: client.php');
    }
} else {
    header('Location: index.php');
}
include "include/head.php";
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	  <!-- Example DataTables Card-->

  <?php
//Affichage du tableau des requetes click to call
echo "<div class='card mb-3'>
		<div class='card-header'>
		<h3 style='text-align:center; color:black;'>Tableau des Requêtes de Click to Call</h1>
		</div>
		<div class='card-body'>
		  <div class='table-responsive'>
			<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'  style='text-align:center;'>
			  <thead>
				<tr>
				    <th>Nom</th>
				    <th>Prenom</th>
				    <th>Mail</th>
				    <th>Telephone</th>
				    <th>Date</th>
				    <th>Avancement</th>
				    <th>Mettre à jour</th>
				    <th>Historique</th>

				</tr>
			  </thead>
			  <tbody>";

//Requete PHP pour récupérer toute la table ctc_request
$requete = 'SELECT * FROM ctc_request WHERE etat=0 or etat=1';
$req = $bdd->query($requete);
// boucle pour afficher toutes les lignes de la table ctc_request
while ($row = $req->fetch()) {

    $user = 'SELECT * FROM users WHERE id="' . $row["user_id"] . '"';
    $userboard = $bdd->query($user);
    $line = $userboard->fetch();

    /*   $getId='SELECT * FROM ctc_request WHERE user_id="'.$line['id'].'"';
    $id_client = $bdd->query($getId);
    $id = $id_client->fetch();*/
    ?>
	<td><?php echo $line['nom']; ?></td>
	<td><?php echo $line['prenom'] ?></td>
	<td><?php echo $line['mail'] ?></td>
	<td><?php echo $line['telephone'] ?></td>
	<td><?php echo $row['dates'] ?></td>
	<?php 
		$rowdate= $row['dates'];

			if(isset($_POST["maj"])){
				echo $_POST["state"];
				echo $_POST["commentaire"];
				echo $_POST["value_id"];

				$insert = $bdd->prepare('UPDATE `ctc_request` SET etat=:etat, commentaire=:commentaire WHERE id=:id_rqst2');
				$insert->bindParam(':commentaire', $_POST["commentaire"]);
				$insert->bindParam(':etat', $_POST["state"]);
				$insert->bindParam(':id_rqst2', $_POST["value_id"]);
				$insert->execute();
			}
	?>
	<td><?php
	if ($row['etat'] == 0) {
        echo 'En attente';
    } elseif ($row['etat'] == 1) {
        echo 'En cours';
    } else {
        echo 'Terminé';}?></td>
				<td>
				
				<button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#maj" onclick="id_request(<?php echo $row['id']?>)"><i class="fa fa-edit"></i> Update</button></td>				
				<td>
				<form method="post" action="historique.php">
					<input name="id" type="hidden" value="<?php echo $line['id'] ?>"></input>
						<button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-file" aria-hidden="true"></i> Historique</button>
					</form></td>				

					
				
			  </tr>
			  <?php } ?>
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>

<div class="modal fade" id="maj" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Mettre à jour</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body" style="text-align:center;">
					<form method="post" action="technicien.php">
					<label for="value_id_hidden">ID de la requête :</label><br>
					<input name="value_id" class="form-control" id="value_id_hidden" value="0" disabled="disabled" style="text-align:center;"></input><br>
					<label for="state">Etat de la requête :</label><br>
					<select class="form-control" id="state" name="state">
					<option name="attente" value="0">En attente</option>
					<option name="cours" value="1">En cours</option>
					<option name="terminee" value="2">Terminée</option>
					</select><br>
					<label for="commentaire">Commentaire :</label><br>
					<textarea class="form-control" id="commentaire"name="commentaire" rows="3" col="10">
					</textarea><br>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Fermer</button>

					<button type="submit" name="maj" class="btn btn-primary">Valider</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- /.container-fluid-->
	<!-- /.content-wrapper-->

<?php
include "include/foot.php";
?>

	
	</div>
	<div class="row">
		<div class="col-md-5">
		</div>
		<div class="col-md-2">
		
		<?php	
			$old_dispo_requete = 'SELECT * FROM worktime WHERE id_technicien="'.$_SESSION["id"].'"';
			$old_dispo_intab = $bdd->query($old_dispo_requete);
			$tech_info = $old_dispo_intab->fetch();
			$old_dispo = $tech_info['etat_disponible'];

			//code à modifier pour la couleur du patch -> besoin de js ou ajax
			if($old_dispo==0){
				$old_color ="green";
				$new_dispo=1;
			}
			if($old_dispo==1){
				$old_color ="red";
				$new_dispo=0;
			}
			


		?>
		<form method="post" action="technicien.php"   onsubmit='setTimeout(function(){window.location.reload();},10)'>
		<div class='alert alert-dark' role='alert'>
				Disponibilité actuelle : <?php if ($old_dispo==0){
													echo "Disponible";
												}else{
													echo "Indisponible";
												}
												?>
  		</div>

		<button type=submit name="bouton_dispo" class="btn btn-default btn-block" style="color:white;background:<?php echo $old_color ?>;">Modifier votre disponibilité</button>
		</form>
		<?php
			if (isset($_POST['bouton_dispo'])) { // si le bouton "bouton_dispo" est appuyé
				
				$insert = $bdd->prepare('UPDATE worktime SET etat_disponible=:new_dispo WHERE id_technicien=:id_tech');
				$insert->bindParam(':new_dispo', $new_dispo);
				$insert->bindParam(':id_tech', $_SESSION["id"]);
				$insert->execute();
			}
		?>
		</div>
		<div class="col-md-5">
		</div>
	</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Page level plugin JavaScript-->
	<script src="vendor/chart.js/Chart.min.js"></script>
	<script src="vendor/datatables/jquery.dataTables.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin.min.js"></script>
	<!-- Custom scripts for this page-->
	<script src="js/sb-admin-datatables.min.js"></script>
	<script src="js/sb-admin-charts.min.js"></script>
	





		<!-- Custom script for the update button-->
	<script type="text/javascript">
	function id_request(newValue){
		document.getElementById("value_id_hidden").value = newValue;
	}
	</script>	

	<script type="text/javascript">
	function id_request_historique(newValue){
		document.getElementById("value_id_client_hidden").value = newValue;
	}
	</script>	



</body>

</html>