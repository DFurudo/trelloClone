<?php

/*informations databse */
$servername = "localhost";
$username = "appliWeb";
$password = "appliWeb";
$dbname = "appliWeb";

/* connexion à la DB */
$conn = mysqli_connect($servername, $username, $password, $dbname);

/* En cas d'échec de connexion */
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}






/* POSITIONNER CE CODE DANS LA TABLE A FAIRE. SI FONCTIONNE, FAIRE LA MEME POUR LES AUTRES */


/* La requête SQL POUR LE MOMENT UNIQUEMMENT CEUX DONT LE STATUT EST A FAIRE*/
$sql = "SELECT id, titre, responsable FROM tache WHERE statut = 'A faire'";

/* Résultat de la requête appliquée à la base de donnée */
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<li><a href='changementInfos.php'>".$row["titre"]."<br>Statut: ".$row["statut"]."<br>Responsable:  ".$row["responsable"]."</a></li>";
    }
    echo "</ul>";
} else {
    echo "Il n'y a rien ici !!!";
}
$conn->close();


 ?>
