<?php
session_start();
$bdd = new PDO('mysql:host=sql.free.fr;dbname=mangagaming', 'mangagaming', 'spooky93');

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id']; //recupère les infos dans la base de donné pour pouvoir vérifier que l'id/ pseudo/mail existe
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: profil.php?id=".$_SESSION['id']); // si sa existe lorsqu'il se connecte il serra dirigé vers son profil
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}


?>



<html>
  <head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="styles.css" />
    
  <link rel="icon" href="favicon.ico" />
     
    <title>MangaGaming</title>
      




    
  </head>
  <body>
    <nav class="menu-nav">
        <nav class="menu-déroulant">
          <ul> 
              <li class="menu-déroulant"><a href="index.php">Accueil</a> 

              </li>
              <li class="menu-déroulant"><a href="index.php">Mangas</a>
                  <ul class="submenu">
                
                    <li><a href="PP.php">Pyscho Pass</a></li>
                    <li><a href="VE.php">Violet Evergarden</a></li>
                    <li><a href="RLIA.php">Your lie in April</a></li>
                    <li><a href="GC.php">Guilty Crown</a></li>
                    <li><a href="JJ.php">Jojo</a></li>
                    <li><a href="FMA.php">FMA</a></li>
                  </ul>
              </li>
              <li class="menu-déroulant"><a href="index.html">Jeux</a>
                  <ul class="submenu">
                      <li><a href="LOL.php">League of legends</a></li>
                      <li><a href="OSU.php">OSU !</a></li>
                      <li><a href="EL.php">Elsword</a></li>
                      <li><a href="S4.php">S4 League!</a></li>
                      <li><a href="AC.php">Assassin's Creed</a></li>
      
                  </ul>
               </li>
              <li class="menu-déroulant"><a href="index.html">Connexion</a>
                <ul class="submenu">
                  <div id="content">
    <div class="leftboxe">
    
    <div class="step">
      
      <ul>
        
        

        <center> <form method="POST" action="">
            Mail: <br/><input type="email" name="mailconnect" placeholder="entrez votre mail" /><br/>






            Mot de passe: <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
            <form>
                     <button><a href="inscription.php"> Je m'inscris</a></button>
                     <center>

                  </td>
               </tr>
<?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
?>
      </div>  
        </li>
          </ul>
                  </ul>
              </li>
          </ul>
       </nav>
     </nav><p>



      <center><img src="baniere.jpg" alt="Photo représentant une image d'anime ainsi qu'une image de gaming"></center><p>
   
   </div>
 <div id="content">
            <div class="leftbox">
    
               <div class="step">
      
                  <div align="center">
                    <div class="float">
                     <h1><center>Actualités Mangas </center></h1></br>
                       <ul>
                          <li><h3><a href="https://www.japan-expo-paris.com/fr/"> Japan Expo</a></li>
                          <img src="japanexpo.jpg" alt="Photo de la Japanexpo" style="float:left;">
                          </br></br></br></br></br><p>Dates de l'évènement : du jeudi 04 juillet au dimanche 7 juillet</br>
                          Un évènement à Paris pour découvrir la culture japonaise, les musiques, les spectacles, des cosplays shows et pleins d'autres divertissements de cultures japonaises</br>
                          Toutes les activiés sont disponibles à partir de ce lien : <a href="https://www.japan-expo-paris.com/fr/programme"> Programme</a>
                        </br></br></br></br></br></br>
                          

                          <li><h3><a href="https://www.parismanga.fr/"> Parismanga</a></h3></li>
                          <img src="parismanga.jpg" alt="Image de Parismanga" style="float:left;">
                          </br></br></br></br></br></br></br>Date de l'évènement : le 05 et 06 octobre 2019</br>
                          Découvrez des confèrences et des dédicaces d'invités rénommés et recontrez vos youtubeurs favoris ! </br>Des animations, des jeux vidéos et des cosplays vous attendent pour une expérience inoubliable.
                          </br></br></br></br></br></br></br> 
                         


                          <li><h3><a href="http://www.allocine.fr/film/fichefilm_gen_cfilm=270440.html"> Weathering with you</a></h3></li>
                          <img src="why.jpg" alt="Image du film" style="float:left;">
                         </br></br></br> <p>Date de sortie : le 19 juillet 2019
                        Découvrez le second film de Makoto Shinkai, après le succès de Your Name !</br>
                        Hodaka Morishima, élève de lycée, quitte son domicile sur une île isolée pour s'installer à Tokyo mais Il devient immédiatement fauché. Il vit ses jours dans l'isolement, </br> mais trouve finalement un travail en tant qu'écrivain pour un magazine occulte louche. Après son entrée en fonction, le temps a été pluvieux jour après jour. </br> Dans un coin de la ville surpeuplée et fréquenté, Hodaka rencontre une jeune fille nommée Hina Amano. En raison de certaines circonstances, </br> Hina et son jeune frère vivent ensemble, mais mènent une vie joyeuse et stable. Hina a aussi un pouvoir: le pouvoir d'arrêter la pluie et de dégager le ciel. </br></br>
</br>

                        Source du synopsis <a href="https://fr.wikipedia.org/wiki/Weathering_with_You"> ici </a>
                      </br></br>
  


                          <li><h3>Court métrage Cyprien (Minori)</h3></li></br>
                          <p>Un français tente de faire ses débuts en tant que mangaka au Japon, il va alors voir un éditeur japonais et recontre Minori qui tente également de faire ses débuts. </br> Cependant, les planches de Minori et de Cyprien se sont mélangés, il tentera de retrouver celle-ci à partir de ses planches qui sont des dessins de la realité. </br>En la retrouvant, il découvre que Minori a jeté les planches de Adrien par inadvertance, pour se faire pardonner, </br>Adrien et Minori vont créer un manga ensemble et le présenteront à l'éditeur en à peine 1 jour. </br></br></br></br>
                          </ul> 

                           

                          <h1>  <center> Actualités Jeux Vidéos</h1></br> </center>
                            <ul> 
                              <li><h3><a href="https://www.e3expo.com/">E3</a></li></br></br>
                                <img src="E3.jpg" alt="Image de l'E3" style="float:left;"></br></br>
                              <p>L'E3 aussi appelé l'Electronic Etertainment Expo est le plus grand évènement du monde de jeux vidéos au monde </br>qui se tient à Los Angeles et se présente chaque année. Elle se passe du mardi 11 juin au vendredi 14 juin cette année. </br>De nombreuses annonces sont attendues nottament des grosses firmes telles que Google ou encore Microsoft.</br> Découvrez le programme et les horaires <a href="https://www.phonandroid.com/e3-2019-date-programme-annonces-tout-savoir.html">ici</a></br></br></br></br></br></br></br></br></br></br>




                              <li><h3><a href="https://parisgamesweek.com/">ParisGamesWeek</a></h3></br>
                              <img src="pgw.png" alt="Image de la PGW" style="float:left;"></br></br></br></br>
                              <p>La ParisGamesWeek est un salon annuel de jeux vidéos. Elle se déroule à Paris du mercredi 30 octobre au dimanche 03 novembre.</br> Cette année, la 10ème édition, </br>de nombreuses novueautés sont présentés en avant-première de jeux et d'innovations technologiques qui sortiront en 2020 telles que la VR (réalités virtuelle)</br> sur plus de 80 000m², de quoi ne pas s'ennuyer !. </br>Il est possible de s'initier dans l'apprentissage du monde informatique comme les bases du codages. </br></br></br></br></br>
                               </ul> 


                          











                         
                        </h3>


                          <li>





                       
                   </div>
                  <p></p>

</div>
</div>
</div>
<div id="content">
            <div class="leftbox">
    
               <div class="step">
      
                  <div align="center">
                      <div class="float">
                        <h1>Attendus</h1>

                          <h3><ul><li>Mangas par Nautiljon</li></h3>
                            <ol>
                            <li><a href="https://www.nautiljon.com/animes/yuri!!!+on+ice+-+ice+adolescence.html">Yuri!!! on Ice : Ice Adolescence</li></a><br>

                            <li><a href="https://www.nautiljon.com/animes/dungeon+ni+deai+wo+motomeru+no+wa+machigatteiru+darou+ka+ii.html">Dungeon ni Deai wo Motomeru no wa Machigatteiru Darou ka II</a></li><br>

                            <li><a href="https://www.nautiljon.com/animes/boku+no+hero+academia+4.html">Boku no Hero Academia 4</a></li><br>

                            <li><a href="https://www.nautiljon.com/animes/gekijouban+violet+evergarden.html">Gekijouban Violet Evergarden</a></li><br>

                            <li><a href="https://www.nautiljon.com/animes/arifureta+shokugyou+de+sekai+saikyou.html">Arifureta Shokugyou de Sekai Saikyou</li><br>

                            <li><a href="https://www.nautiljon.com/animes/gekijouban+made+in+abyss+-+fukaki+tamashii+no+reimei.html">Gekijouban Made in Abyss : Fukaki Tamashii no Reimei</a></li><br>

                            <li><a href="https://www.nautiljon.com/animes/sword+art+online+-+alicization+-+war+of+underworld.html">Sword Art Online : Alicization - War of Underworld</a></li><br>

                            <li><a href="https://www.nautiljon.com/animes/yakusoku+no+neverland+2.html">Yakusoku no Neverland 2</a></li><br>

                            <li><a href="https://www.nautiljon.com/animes/tensei+shitara+slime+datta+ken+2.html">Tensei Shitara Slime Datta Ken 2</a></li><br>

                            <li><a href="https://www.nautiljon.com/animes/quan+zhi+gao+shou+2.html">Quan Zhi Gao Shou 2</a></li></br>





                          </ol>
                           <h3><ul><li>Jeux vidéos par sens critique</li></h3>
                            <ol><li><a href="https://www.senscritique.com/jeuvideo/Doom_Eternal/35108904">Doom Eternal</a></li></br>

                            <li><a href="https://www.senscritique.com/jeuvideo/Pokemon_Epee/25447706">Pokemon Epée</a></li></br>

                            <li><a href=https://www.senscritique.com/jeuvideo/Animal_Crossing_Switch_Titre_Provisoire/36757683>Animal Crossing Switch</a></li></br>

                            <li><a href="https://www.senscritique.com/jeuvideo/Death_Stranding/21588200">Death Stranding</li></br>

                            <li><a href="https://www.senscritique.com/jeuvideo/Metroid_Prime_4/25446862">Metroid Prime 4</a></li></br>

                            <li><a href="https://www.senscritique.com/jeuvideo/Ghost_of_Tsushima/28408614">Ghost of Tsushima</a></li></br>

                            <li><a href="https://www.senscritique.com/jeuvideo/Resident_Evil_2/16816641">Resident Evil 2</a></li></br>

                            <li><a href="https://www.senscritique.com/jeuvideo/Cyberpunk_2077/477439">CyberPunk 2077</a></li></br>

                            <li><a href="https://www.senscritique.com/jeuvideo/Bayonetta_3/28915777">Bayonetta 3</a></li></br>

                            <li><a href="https://www.senscritique.com/jeuvideo/Shin_Megami_Tensei_V/24429077">Shin Megami Tensei V</a></li></br>






                          </ol>
    
                   </div> </div></div></div>

                   <div id="content">
            <div class="leftbox">
    
               
</div>
</div>
</div>
   
    
    

    








 








</html>