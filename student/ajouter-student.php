<?php 
    require __DIR__.'/student-data.php';

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $groupe = $_POST["groupe"];

    $student = new Student(0,$nom, $prenom, $email, $groupe, []);
    $saved_student_id = insertStudent($student);
    header('Location: ../Ajoute un recour.php?id_student='.$saved_student_id);
    
?>

