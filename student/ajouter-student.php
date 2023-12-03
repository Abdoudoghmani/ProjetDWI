<?php 
    require __DIR__.'/student-data.php';

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $groupe = $_POST["groupe"];

    $student = new Student($nom, $prenom, $email, $groupe);
    insertStudent($student);
    header('Location: ../listing.php');
    
?>

