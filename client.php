<?php
require'pdo.php';
$bdd = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd.';charset=utf8',$PARAM_utilisateur , $PARAM_mot_passe);

session_start();
if($_SESSION["rang"]==1){
	header('Location: index.php');
}
include("include/head.php");


?>
  <div class="content-wrapper">
  <div style="width:60%;margin-left:20%;margin-top:5%;">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#fiche" style="width:60%;margin-left:20%;">Fiche Personnelle</button>
</div>
      <form method="post" action="client.php">
      <div  style="float:left;width:60%;margin-left:20%;margin-top:5%">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#appel" style="width:60%;margin-left:20%;"><i class="fa fa-fw fa-phone" ></i>Appel de Dépannage</button>

      <!--<button class="btn btn-info btn-lg" type="submit" name="envoie" style="width:60%;margin-left:20%;"></i></button>-->
    </div>
  </form>



  </div>
      <!-- Modaux-->
      <!-- Modal de fiche personnelle -->
    <div class="modal fade" id="fiche" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Fiche Personnelle</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
      		    <?php 
      				echo"
      				<form method='post' action='client.php'>
      				<div style='width:100%;text-align:center;'>
      				<label for='nom' style='font-weight:bold;'>Nom</label><br>
      				<input name='nom' id='nom' style='text-align:center;' value='".$_SESSION["nom"]."'></input><br>
      				<label for='prenom' style='font-weight:bold;'>Prenom</label><br>
      				<input name='prenom' id='prenom' style='text-align:center;' value='".$_SESSION["prenom"]."'></input><br>
      				<label for='mail' style='font-weight:bold;'>Mail</label><br>
      				<input name='mail' id='mail' style='text-align:center;' value='".$_SESSION["mail"]."'></input><br>
      				<label for='telephone'  style='font-weight:bold;'>Telephone</label><br>
      				<input name='telephone' id='telephone' style='text-align:center;' value='".$_SESSION["telephone"]."'></input><br>
      				"
	           ?> 
          </div>
           <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Fermer</button>
  	
             <button name="enregistrer" class="btn btn-primary">Enregistrer</button>
  		       </form>
          </div>
          </div>
		    </div>
      </div>
    </div>
	
      <!-- Modal d'appel -->
 <div class="modal fade" id="appel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Appel de dépannage</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="client.php">
            <input type="checkbox" name="numero" value="numero">  Je veux être appelé sur mon numéro enregistré<br><br>
            <label id="new_num">Je veux être appelé sur un autre numéro:</label>
            <input id="new_num" type="text" size="20" maxlength="11" name="txtphonenumber"><br>
          </div>
           <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Fermer</button>
    
             <button type="submit" name="envoie" class="btn btn-primary">Lancer la requête d'appel</button>
             </form>
          </div>
          </div>
        </div>
      </div>
    </div>


<?php
if(isset($_POST['envoie'])) { // si le bouton "envoie" est appuyé
  $strHost = "192.168.141.18";
$strUser = "admin";
$strSecret = "secret";
# Numéro Technicien

$strChannel = "SIP/11";
$strContext = "base";
$strWaitTime = "30";
$strPriority = "1";
$strMaxRetry = "2";
# Numéro à appeler
if(isset($_POST["numero"])){
        echo "[DEBUG] la case est coché";
      $query=$bdd->prepare('SELECT * FROM users WHERE id ="'. $_SESSION["id"].'"');
      $query->execute();
      print_r($query->errorInfo()) ;
      $data=$query->fetch();
      $strExten=$data['telephone'];
      echo "[DEBUG] le requete est faite";
      


}
else if(isset($_POST['txtphonenumber'])){
        echo "[DEBUG] le numero est entré manuellement";

        $strExten = $_POST['txtphonenumber'];
}
$strCallerId = "Web Call $strExten";
$length = strlen($strExten);

if (/*$length == 4 && */is_numeric($strExten)) {
  $socket = fsockopen($strHost, 5038);  
  if($socket) {
    fputs($socket, "Action: login\r\n");
    fputs($socket, "Events: off\r\n");
    fputs($socket, "Username: $strUser\r\n");
    fputs($socket, "Secret: $strSecret\r\n\r\n");
    fputs($socket, "Action: originate\r\n");
    fputs($socket, "Channel: $strChannel\r\n");
    fputs($socket, "WaitTime: $strWaitTime\r\n");
    fputs($socket, "CallerId: $strCallerId\r\n");
    fputs($socket, "Exten: $strExten\r\n");
    fputs($socket, "Context: $strContext\r\n");
    fputs($socket, "Priority: $strPriority\r\n\r\n");
    fputs($socket, "Action: Logoff\r\n\r\n");
    while($line = fgets($socket)) {
      $line = trim($line);
      echo $line."<br>";
    }
  fclose($socket);
} 
} 

  
  // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
    $Login = $_SESSION["login"];
    $dates =strftime('%d/%m/%Y - %H:%M:%S');
    //date('l jS \of F Y h:i:s A');
  $etat=0;

    $insert = $bdd->prepare('INSERT INTO `ctc_request`(`user_id`, `dates`, `etat`) VALUES (:user_id, :dates, :etat)');
    $insert->bindParam(':user_id', $_SESSION["id"]);
    $insert->bindParam(':dates', $dates);
    $insert->bindParam(':etat', $etat);
    $insert->execute();
}  




if(isset($_POST["enregistrer"])) { // si le bouton "enregistrer" est appuyé

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['telephone']) ) //Oublie d'un champ
    {
        echo"Un champ est incomplet";
    }
    else 
    {
	$Login = $_SESSION["login"];

    $con=mysqli_connect("localhost","root","","click_to_call");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries
mysqli_query($con,'UPDATE users SET nom="'.$_POST['nom'].'", prenom="'.$_POST['prenom'].'", mail="'.$_POST['mail'].'",telephone='.$_POST['telephone'].' WHERE login="'.$Login.'"');
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['nom'] =  $_POST['nom'];
    $_SESSION['prenom'] =  $_POST['prenom'];
    $_SESSION['telephone'] =  $_POST['telephone'];
mysqli_close($con);

}
}
include("include/foot.php");
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
</body>

</html>
