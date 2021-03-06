<?php
require'pdo.php';
session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
$bdd = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd.';charset=utf8',$PARAM_utilisateur , $PARAM_mot_passe);
include("include/head.php");

if (!empty($_SESSION['login'])) {
	if ($_SESSION["rang"] == 1) {
		header('Location: technicien.php');
	} else if($_SESSION["rang"] == 0) {
	header('Location: client.php');
	}
}
?>

<?php 
$logOk='';

if(!isset($_POST['connexion'])) {

echo"<body class='bg-dark'>
  <div class='container'>
    <div class='card card-login mx-auto mt-5'>
      <div class='card-header'>Connexion</div>
      <div class='card-body'>
        <form method='post'>
          <div class='form-group'>
            <label for='exampleInputEmail1'>Login</label>
            <input class='form-control' name='login' id='exampleInputEmail1' type='Login' aria-describedby='Login' placeholder='Entrer votre login'>
          </div>
          <div class='form-group'>
            <label for='exampleInputPassword1'>Password</label>
            <input class='form-control' name='password' id='exampleInputPassword1' type='password' aria-describedby='Password' placeholder='Entrer votre Mot de passe'>
          </div>
          <button class='btn btn-dark btn-block' name='connexion'>Valider</button><br>
        </form>
          <a href='index.php'style='text-decoration:none'><button type='button' class='btn btn-dark btn-block'>Retourner à l'accueil</button></a>
      </div>
</div>";}
if(isset($_POST['connexion'])) { // si le bouton "Connexion" est appuyé

    if (empty($_POST['login']) || empty($_POST['password']) ) //Oublie d'un champ
    {
        $logOk = 'notOk';
    }
    else //On check le mot de passe
    {
      $query=$bdd->prepare('SELECT * FROM users WHERE login = :login');
      $query->bindValue(':login',$_POST['login'], PDO::PARAM_STR);
      $query->execute();
      $data=$query->fetch();
	 if ($data['password'] == sha1($_POST['password'])) // Acces OK !
	{
	    $_SESSION['login'] = $data['login'];
	    $_SESSION['rang'] = $data['rang'];
	    $_SESSION['id'] = $data['id'];
		$_SESSION['password'] = sha1($data['password']);
		$_SESSION['mail'] = $data['mail'];
		$_SESSION['nom'] = $data['nom'];
		$_SESSION['prenom'] = $data['prenom'];
		$_SESSION['telephone'] = $data['telephone'];
		

	    $logOk = 'ok';
	}
	else // Acces pas OK !
	{
	    $logOk = 'notOk';
	}
    $query->CloseCursor();
    }

$action ='';
if($logOk =='ok'){	
	if($_SESSION['rang']==0){

		  header('Location: client.php');  
}
	else if($_SESSION['rang']==1){
		 header('Location: technicien.php');
	}
}
else {
  header('Location: technicien.php');
}
}
?>
  </div>
  
 <?php 
include("include/foot.php");
?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
