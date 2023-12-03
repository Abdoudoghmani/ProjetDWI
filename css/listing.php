<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des étudiants</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Groupe</th>
                </tr>
            </thead>
            <tbody>
                
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

            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies (Popper.js, jQuery) -->
    <script src="path/to/popper.js"></script>
    <script src="path/to/jquery.js"></script>
    <script src="path/to/bootstrap.js"></script>
</body>

</html>