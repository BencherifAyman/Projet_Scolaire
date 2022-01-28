<?php
session_start();
$bdd = new PDO('mysql:host=sql.free.fr;dbname=mangagaming', 'mangagaming', 'spooky93');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']); //permet de sécurisé est que l'utilisateur obligé d'avoir un nbr en id
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?'); 
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
    //permet d'obtenir les informations de la base de donné)
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
          <link rel="stylesheet" href="style.css" />
   </head>
  <body>
    <center>
      <div id="content">
        <div class="leftbox">
    
          <div class="step">
      
           <div align="center">
              <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
              <br /><br />
              Pseudo = <?php echo $userinfo['pseudo']; ?>
              <br />
              Mail = <?php echo $userinfo['mail']; ?>
              <br />
              <?php
              if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
              ?>
              <br />
              <a href="editionprofil.php">Editer mon profil</a>
              <a href="index.php">Se déconnecter</a>
         <?php
         }
         ?>
          </div>
        </div>
      </div>
    </div>
  </center>
</body>
</html>
<?php   
}
?>

