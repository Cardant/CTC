<?php
session_start();

require 'pdo.php';
// Connexion à la base de données
$clicktocall = new PDO('mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd . ';charset=utf8', $PARAM_utilisateur, $PARAM_mot_passe);
$asterisk = new PDO('mysql:host=' . $PARAM_hote . ';dbname=asterisk;charset=utf8', $PARAM_utilisateur, $PARAM_mot_passe);


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
$phones_historic_request = 'SELECT * FROM cdr';
$phones_historic = $asterisk->query($phones_historic_request);
$array_phones_historic = $phones_historic->fetch();

$num_rows = $phones_historic->rowCount();
if($num_rows==0){
	echo "	<div class='alert alert-danger' role='alert'>
				Aucun résultat, le client n'a pas de requêtes terminées.
  			</div>";
}
else{
//Affichage du tableau des requetes click to call
echo "  <div class='card mb-3'>
			<div class='card-header'>
				<h3 style='text-align:center; color:black;'>Tableau des appels</h1>
			</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'  style='text-align:center;'>
						<thead>
							<tr>
								<th>Date de l'appel</th>
								<th>numéro du client</th>
								<th>durée de l'appel</th>
							</tr>
						</thead>
						<tbody>";
							while ($array_phones_historic = $phones_historic->fetch()) {
								?>
								<td><?php echo $array_phones_historic["calldate"] ?></td>
								<td><?php echo $array_phones_historic["dst"] ?></td>
								<td><?php echo $array_phones_historic["duration"] ?></td>
								</tr>
								</tbody>
							<?php }?>
					</table>
				</div>
			</div>
		</div>
<?php } ?>
				<div>
				<a href="technicien.php"><button type=button class="btn btn-light" style="margin-left:45%">Revenir en arrière</button></a>
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