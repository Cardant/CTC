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
    header('Location: login.php');
}
include "include/head.php";
?>

<?php
$client_ctc = 'SELECT * FROM ctc_request WHERE user_id=' . $_POST["id"] . ' AND (etat=1 or etat=2)';
$client_ctc_request = $bdd->query($client_ctc);

$client_info = 'SELECT * FROM users WHERE id=' . $_POST["id"];
$client_private_info = $bdd->query($client_info);
$array_client_private_info = $client_private_info->fetch();

//Affichage du tableau des requetes click to call
echo "<div class='card mb-3'>
				<div class='card-header'>
				<h3 style='text-align:center; color:black;'>Tableau des Requêtes du client nommé " . $array_client_private_info['nom'] . "</h1>
				</div>
				<div class='card-body'>
					<div class='table-responsive'>
					<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'  style='text-align:center;'>
						<thead>
						<tr>
							<th>ID requête</th>
							<th>ID client</th>
							<th>Date de requête</th>
							<th>Etat de la requête</th>
							<th>Commentaire</th>

						</tr>
						</thead>
						<tbody>";
while ($array_client_ctc_request = $client_ctc_request->fetch()) {
    ?>
						<td><?php echo $array_client_ctc_request["id"] ?></td>
						<td><?php echo $array_client_ctc_request["user_id"] ?></td>
						<td><?php echo $array_client_ctc_request["dates"] ?></td>
						<td><?php echo $array_client_ctc_request["etat"] ?></td>
						<td><?php echo $array_client_ctc_request["Commentaire"] ?></td>
						</tr>
						</tbody>
						<?php }?>
					</table>
				</div>
				</div>
				</div>
				<div>
				<a href="index.php"><button type=button class="btn btn-primary" style="margin-left:45%">Revenir en arrière</button></a>
				</div>


<?php
include "include/foot.php";
?>
 </div>
</body>

</html>