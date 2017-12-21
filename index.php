<?php

$bdd = new PDO("mysql:host=localhost;dbname=appliWeb", 'younes_trello', '*********');

if(isset($_POST['forminscription'])){

    
if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['motdepasse2'])){
$pseudo = htmlspecialchars($_POST['pseudo']);
$pseudolength = strlen($pseudo);
   $mdp = sha1($_POST['mdp']);
   $motdepasse2 = sha1($_POST['motdepasse2']);

if($pseudolength <= 255)
    $reqpseudo = $bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = ?");
               $reqpseudo->execute(array($pseudo));
               $pseudoexist = $reqpseudo->rowCount();
               if($pseudoexist == 0) {
    
    if($mdp == $motdepasse2){
        $insertmbr = $bdd->prepare("INSERT INTO utilisateur(pseudo, motdepasse) VALUES(?, ?)");
        $insertmbr->execute(array($pseudo, $mdp));
        $erreur = "Votre compte a bien été créé !";
 
    }
    
    else{
        
        $erreur = " Vos mot de passe ne correspondent pas ! ";
    
    }
               }
    
    else
    
    {
       $erreur = 'Pseudo deja uitilisé';
    
    }

}
   else
   {
        
        $erreur = "Votre pseudo ne doit pas dépassé plus de 255 charcateres";
    }

}
    
    else
    {
        $erreur= "Tous les champs doivent etre complétés" ;
    }




?>


<html>

   <head>
      <title>INSCRIPTION</title>
      <meta charset="utf-8">
      
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

  <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous"
    >

       
   </head>
   <body>
      <div align="center">
         <h2>Inscription</h2>
      </div>
         <br /><br />
         <form method="POST" action="" role="form" class="container">
            <div class="form-group">
                     <label for="identifiant">Pseudo :</label>
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="" class="form-control"/>
            </div>
            
                <div class="form-group">    
                     <label for="mdp">Mot de passe :</label>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" class="form-control"/>
             </div>
             
              <div class="form-group">    
                     <label for="motdepasse2"> Confirmez votre mot de passe :</label>
                     <input type="password" placeholder="Confirmez votre mot de passe" id="motdepasse2" name="motdepasse2" class="form-control"/>
             </div>
 
            <div align="center">    
                     <input type="submit" name="forminscription" value="S'inscrire" class="btn btn-default">
                <p>Pour vous connecter cliquez sur  <a href="connexion.php">Connexion</a></p>

        </div>
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
       
       

