<?php 
    require dirname(__DIR__).'/connect_bdd.php';
    require __DIR__.'/recour.php';


    function getAllRecour() {
        global $conn; // Assuming $conn is your PDO database connection
    
        try {
            $recours_stmt = $conn->prepare(
                "SELECT id_student, module, nature, note_affiche, note_reel, status FROM `recours`"
            );
            $recours_stmt->execute();
            $recours_data = $recours_stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $recours = [];
    
            foreach ($recours_data as $recour_data) {
                $recour = new Recour(
                    $recour_data['id_student'],
                    $recour_data['module'],
                    $recour_data['nature'],
                    $recour_data['note_affiche'],
                    $recour_data['note_reel'],
                    //$recour_data['status']
                );
    
                $recours[] = $recour;
            }
    
            return $recours;
    
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            return false;
        }
    }
    function insertRecour($recour) {
        global $conn;

        try {
            $insert_stmt = $conn->prepare(
                "INSERT INTO `recours` (id_student, module, nature, note_affiche, note_reel, status)
                 VALUES (:id_student, :module, :nature, :note_affiche, :note_reel, :status)"
            );

            $id_student = 2;
            $insert_stmt->bindParam(':id_student', $id_student, PDO::PARAM_INT);
            $insert_stmt->bindParam(':module', $recour->module);
            $insert_stmt->bindParam(':nature', $recour->nature);
            $insert_stmt->bindParam(':note_affiche', $recour->note_affiche);
            $insert_stmt->bindParam(':note_reel', $recour->note_reel);
            $insert_stmt->bindParam(':status', $recour->status);

            $insert_stmt->execute();

        } catch(PDOException $e) {
            echo "Insert failed: " . $e->getMessage();
            return false;
        }
}
?>