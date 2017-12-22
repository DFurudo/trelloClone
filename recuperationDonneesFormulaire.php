<?php

/* INSERER LES DONNES DU FORMULAIRE DANS LA BASE DE DONNEE */



/* Récupération du titre entré dans le formulaire */
$titreValue = $_POST["NOMADEFINIR-TITRE"];

/* Insertion du titre dans une nouvelle ligne de la base de donnée */
try {
    $pdo = new PDO('mysql:host=localhost;dbname=appliWeb','appliweb','appliWeb');

    $sql = "INSERT INTO `tache` (`titre`) VALUES ('$titreValue');";
    $req = $pdo->prepare($sql);
    $req->execute();

    $req = null;
    $pdo = null;

} catch (PDOException $e) {
    http_response_code(500);
    die();
}


/*Si un responsable est attribué directement dans le formulaire, alors le statut va se changer automatiquement en 'Attribué' dans la DB */

if (isset($_POST["NOMADEFINIR-RESPONSABLE"])) {

  $responsableValue = $_POST["NOMADEFINIR-RESPONSABLE"];

  try {
      $pdo = new PDO('mysql:host=localhost;dbname=appliWeb','appliweb','appliWeb');

      $sql = "INSERT INTO `tache` (`responsable`, `statut`) VALUES ('$responsableValue', 'Attribué');";
      $req = $pdo->prepare($sql);
      $req->execute();

      $req = null;
      $pdo = null;

  } catch (PDOException $e) {
      http_response_code(500);
      die();
  }
}


?>
