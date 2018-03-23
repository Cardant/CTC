<?php
session_start();

require 'pdo.php';
// Connexion à la base de données
$bdd = new PDO('mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd . ';charset=utf8', $PARAM_utilisateur, $PARAM_mot_passe);
include('var.php');

// Condition pour afficher la page : être technicien Sinon redirection vers la page de connexion
if (!empty($_SESSION['login'])) {

	if ($_SESSION["rang"] == 0) {
		header('Location: client.php');
	}
} else {
	header('Location: login.php');
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
				  <th>Historique</th>

				</tr>
			  </thead>
			  <tbody>";

//Requete PHP pour récupérer toute la table ctc_request
$requete = 'SELECT * FROM ctc_request WHERE etat=0 or etat=1';
$req = $bdd->query($requete);

// boucle pour afficher toutes les lignes de la table ctc_request
$array_id = array();
while ($row = $req->fetch()) {
	$user = 'SELECT * FROM users WHERE id="' . $row["user_id"] . '"';
	$userboard = $bdd->query($user);
	$line = $userboard->fetch();

	/*   $getId='SELECT * FROM ctc_request WHERE user_id="'.$line['id'].'"';
	$id_client = $bdd->query($getId);
	$id = $id_client->fetch();*/
	?>

			  <td><?php echo $line['nom'] ?></td>
			  <td><?php echo $line['prenom'] ?></td>
			  <td><?php echo $line['mail'] ?></td>
			  <td><?php echo $line['telephone'] ?></td>
			  <td><?php echo $row['dates'] ?></td>
			  <td><?php if ($row['etat'] == 0) {
		echo 'En attente';
	} elseif ($row['etat'] == 1) {
		echo 'En cours';
	} else {
		echo 'Terminé';}?></td>
				<td>
				<form method="post" action="historique.php">
				<input name="id" type="hidden" value="<?php echo $line['id'] ?>"></input>
				<button type="submit"><i class="fa fa-file" aria-hidden="true"></i></button>

				</form>
				</td>
			  </tr>
			  <?php }?>
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>



	<!-- /.container-fluid-->
	<!-- /.content-wrapper-->

<?php
include "include/foot.php";
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
				$new_dispo=1;
				$new_color="red";
			}
			if($old_dispo==1){

				$new_dispo=0;
				$new_color="green";
			}
			


		?>
		<form method="post" action="index.php">
		<button type=submit name="bouton_dispo" class="btn btn-default" style="float:left;position:absolute;top:0;left:0;color:white;background:<?php echo $new_color ?>;">Modifier votre disponibilité</button>
		</form>
		<?php
		echo $old_dispo;
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

</body>

</html>