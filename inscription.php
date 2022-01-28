<?php
$bdd = new PDO('mysql:host=sql.free.fr;dbname=mangagaming', 'mangagaming', '******');

if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                     $insertmbr->execute(array($pseudo, $mail, $mdp));
                     $erreur = "Votre compte a bien été créé ! <a href=\"index.php\">Me connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>
   <head>
   	<nav class="menu-nav">
      <title>MangaGaming</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="styleinscription.css" />
       <center><img src="headaccueil.jpg" alt="Photo représentant une image d'anime ainsi qu'une image de gaming" /></center>

		
		 	<center> 
		 	<ul> 
		 			 <li class='listes'> <a href="index.html">Accueil </a> </li>
		 			 <li class='listes'> <a href="article.html">Articles </a> </li>
		 	    	 <li class='listes'> <a href="manga.html"> Mangas</a> </li>  
		 	    	 <li class='listes'> <a href="Jeu.html"> Jeux</a> </li>
		 	</ul>
		 	</center>
	</div>
	</nav>
	 
     
		<title>MangaGaming</title>
   </head>
   <body>

   	<br /><br /><br /><br /><br />
   	<center><div id="content">
      <div align="center">
         <nav class="menu-nav">
         	<div class="centerbox">

		

    	  <center> 
		 	<ul> 
		 			 
		 	    	 <li class='listes'> <a href="inscription.html"> Inscription à MangaGaming</a> 
		 	</ul>
		 	</center>

         <br /><br />
         <form method="POST" action="">
            <table>

               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />  
                  </td> 
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail">Mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2">Confirmation du mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" />
       
         <?php
         if(isset($erreur)) 
         {
            echo'<font color="red">' .$erreur."</font>"; //permet de mettre une phrase pour l'erreur qui serra séléctionner en fonction du code audessus
         }
         ?>   
      </td>
               </tr>
            </table>
         </form>
     </center> </div>
       </div>
   </body>
            
</html>