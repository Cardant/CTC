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

$requete = 'SELECT * FROM ctc_request WHERE etat=0 or etat=1';
$req = $bdd->query($requete);
$num_rows = $req->rowCount();
if($num_rows==0){
	echo "	<div class='alert alert-danger' role='alert'>
				Aucun résultat, il n'y a aucune requêtes dans la base de données.
  			</div>";
}
else{

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


// boucle pour afficher toutes les lignes de la table ctc_request
while ($row = $req->fetch()) {

    $user = 'SELECT * FROM users WHERE id="' . $row["user_id"] . '"';
    $userboard = $bdd->query($user);
    $line = $userboard->fetch();$x = 1;
    ?>
	<td><?php echo $line['nom']; ?></td>
	<td><?php echo $line['prenom']; ?></td>
	<td><?php echo $line['mail']; ?></td>
	<td><?php echo $line['telephone']; ?></td>
	<td><?php echo $row['dates']; ?></td>

	<td><?php
	
	if ($row['etat'] == 0) {
        echo 'En attente';
    } elseif ($row['etat'] == 1) {
        echo 'En cours';
    } else {
		echo 'Terminé';
	}?>
	</td>
	<td><button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#maj" onclick="func_id_request(<?php echo $row['id']?>,<?php echo $row['etat']?>,'<?php echo $row['commentaire']?>')"><i class="fa fa-edit"></i> Mettre à jour</button>
	</td>				
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
<?php } ?>
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
					<form name="update_request" method="post" onsubmit='setTimeout(function(){window.location.reload();},10)' action="technicien.php">
					<input name="value_id_hidden" class="form-control" id="value_id_hidden" value="0" type="hidden" style="text-align:center;"></input><br>
					<label for="state">Etat de la requête :</label><br>
					<select class="form-control" id="state" name="state" style="text-align: center; text-align-last: center;">
					<option name="attente" value="0">En attente</option>
					<option name="cours" value="1">En cours</option>
					<option name="terminee" value="2">Terminée</option>
					</select><br>
					<div class="form-group">
  						<label for="commentaire">Commentaire:</label><br>
						  
  						<textarea class="form-control"id="commentaire"name="commentaire"  rows="3"></textarea><br>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Fermer</button>

					<button type="submit" name="maj" class="btn btn-dark">Valider</button>
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
			}
			


		?>
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
	function func_id_request(id_requete,etat,commentaire){
		
		document.getElementById("value_id_hidden").value = id_requete;
		if(etat==0){
			document.getElementById('state').value="0";
		}else if(etat==1){

			document.getElementById('state').value="1";
		}else{

			document.getElementById('state').value="2";
		}
		document.getElementById("commentaire").value = commentaire;

	}
	</script>	
</body>

</html>