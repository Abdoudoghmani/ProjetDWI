<?php 
    require __DIR__.'/recour-data.php';
    $id_student = $_POST['id_student'];
    $module = $_POST['module'];
    $nature = $_POST['nature'];
    $note_affiche = $_POST['noteAffichee'];
    $note_reel = $_POST['noteReelle'];
    $status = 1;
    // $status = $_POST['status'];

    $recour = new Recour($module, $nature, $note_affiche, $note_reel, $status);
    insertRecour($recour, $id_student);
    header('Location: ../index.php');
    
?>