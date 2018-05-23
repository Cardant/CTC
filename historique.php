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

<?php
$client_ctc = 'SELECT * FROM ctc_request WHERE user_id=' . $_POST["id"] . ' AND  etat=2';
$client_ctc_request = $bdd->query($client_ctc);
$num_rows = $client_ctc_request->rowCount();

$client_info = 'SELECT * FROM users WHERE id=' . $_POST["id"];
$client_private_info = $bdd->query($client_info);
$array_client_private_info = $client_private_info->fetch();
if($num_rows==0){
	echo "	<div class='alert alert-danger' role='alert'>
				Aucun résultat, le client n'a pas de requêtes terminées.
  			</div>";
}
else{
//Affichage du tableau des requetes click to call
echo "  <div class='card mb-3'>
			<div class='card-header'>
				<h3 style='text-align:center; color:black;'>Tableau des Requêtes de " .$array_client_private_info['prenom']." ".$array_client_private_info['nom'] . "</h1>
			</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'  style='text-align:center;'>
						<thead>
							<tr>
								<th>Date de requête</th>
								<th>Etat de la requête</th>
								<th>Commentaire</th>
							</tr>
						</thead>
						<tbody>";
							while ($row = $client_ctc_request->fetch()) {
								?>
								<td><?php echo $row["dates"] ?></td>
								<td><?php if($row["etat"]==1){
											echo "En cours";
								}elseif($row["etat"]==2){
									echo "Terminée";
								} ?></td>
								<td><?php echo $row["commentaire"] ?></td>
								</tr>
								<?php }?>
								</tbody>
							
					</table>
				</div>
			</div>
		</div>
<?php } ?>
				<div>
				<a href="technicien.php"><button type=button class="btn btn-dark" style="margin-left:10%">Revenir en arrière</button></a>
				</div>


<?php
include "include/foot.php";
?>
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

</body>

</html>