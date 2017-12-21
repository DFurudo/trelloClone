<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=appliWeb", 'younes_trello', '***********');

if(isset($_POST['formconnexion']))

{
    
    $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($_POST['pseudoconnect']) AND !empty($_POST['mdpconnect']))
    
        {
        
            $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = ? AND motdepasse = ? ");
            $requser->execute(array($pseudoconnect, $mdpconnect));
            $userexist = $requser->rowCount();
            if($userexist == 1 )
            
                    {
                 $userinfo = $requser->fetch();
                 $_SESSION['id'] = $userinfo['id'];
                 $_SESSION['pseudo'] = $userinfo['pseudo'];
                 header("Location: profil.php?id=".$_SESSION['id']);
            

                    } 
        else
        
        {
            $erreur = 'Identifiant ou mot de passe incoorect';
        }
        }
    else{
        $erreur = 'Tous les champs doivent etre rempli ! ';
    }


}


?>



<html>

   <head>
      <title>Connexion</title>
      <meta charset="utf-8">
      
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="man.css" />
       
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 

       </head>
   <body>
      <div align="center">
         <h2>Connexion</h2>
      </div>
         <br /><br />
         <form method="POST" action="" role="form" class="container">
            <div class="form-group">
                     <label for="identifiant">Pseudo :</label>
                     <input type="text" placeholder="Votre pseudo" id="pseudoconnect" name="pseudoconnect" class="form-control"/>
            </div>
            
                <div class="form-group">    
                     <label for="mdp">Mot de passe :</label>
                     <input type="password" placeholder="Votre mot de passe" id="mdpconnect" name="mdpconnect" class="form-control"/>
             </div>
             
            
            <div align="center">    
                     <input type="submit" name="formconnexion" value="Se connecter" class="btn btn-default">

        </div>
             <p>Pas encore de compte clique sur <a href='index.php'>Inscription</a></p>
         </form>
       
       <?php
      
       if(isset($erreur))
       {
            
           echo $erreur;
       
       }
       
       ?>
       
       
       
   </body>
</html>
       
       

       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
       
       
       
