<?php
session_start();

require 'pdo.php';
// Connexion à la base de données
$bdd = new PDO('mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd . ';charset=utf8', $PARAM_utilisateur, $PARAM_mot_passe);

include "include/head.php";
?>

<div class="jumbotron">
  <h1 class="display-4">Bienvenue sur le site de Solea!</h1>
  <p class="lead">Vous êtes client chez Solea ? Vous avez besoin de contacter un technicien ? Vous êtes au bon endroit.</p>
  <hr class="my-4">
  <div class="row">
<div class="col-md-6">
  <p>
Solea est un acteur historique dans le domaine de l’énergie autonome et des économies d’énergie. Nos experts conçoivent, installent et maintiennent des solutions techniques afin de répondre aux besoins croissants du marché mondial. Nous disposons d’un centre de formation agréé afin d’accompagner nos clients dans la réalisation de leurs projets. Nous intervenons depuis 2003 sur les marchés du site isolé (off-grid), de l’aménagement urbain, des applications industrielles autonomes, de la mobilité Energie et de la supervision (monitoring) Energies des installations individuelles et collectives.</p>
</div>
<div class="col-md-6">

  <img src="image/panneau-solaire.jpg" class="img-thumbnail" alt="img-thumbnail" width=600 height=400>
</div>
</div>

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
	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin.min.js"></script>
	<!-- Custom scripts for this page-->
	<script src="js/sb-admin-charts.min.js"></script>
</body>

</html>