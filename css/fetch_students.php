<?php
// Connexion à la base de données MySQL
$mysqli = new mysqli("hostname", "username", "password", "database_name");

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("La connexion à la base de données a échoué : " . $mysqli->connect_error);
}

// Requête SQL pour récupérer les étudiants
$sql = "SELECT nom, prenom, email, groupe FROM etudiants";
$result = $mysqli->query($sql);

// Afficher les étudiants dans le tableau
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nom"] . "</td><td>" . $row["prenom"] . "</td><td>" . $row["email"] . "</td><td>" . $row["groupe"] . "</td></tr>";
    }
} else {
    echo "Aucun étudiant trouvé dans la base de données.";
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
