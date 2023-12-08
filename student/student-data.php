<?php 
    require dirname(__DIR__).'/connect_bdd.php';
    require __DIR__.'/student.php';

    function getStudents($search_text) {
        global $conn;
    
        try {
            $students_stmt = $conn->prepare(
                "
                SELECT id, nom, prenom, email, groupe 
                FROM `students`
                WHERE nom like :search_text
                or prenom like :search_text
                or email like :search_text
                or concat(nom, ' ', prenom) like :search_text
                or concat(prenom, ' ', nom) like :search_text
                "
            );

            $search_text = '%'.$search_text.'%';
            $students_stmt->bindParam(':search_text', $search_text);
            $students_stmt->execute();
            $students_data = $students_stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $students = [];
    
            foreach ($students_data as $student_data) {
                $recours = getRecoursByStudentId($student_data['id']);
                $student = new Student(
                    $student_data['id'],
                    $student_data['nom'],
                    $student_data['prenom'],
                    $student_data['email'],
                    $student_data['groupe'],
                    $recours
                );
    
                $students[] = $student;
            }
    
            return $students;
    
        } catch(PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    function getAllStudents() {
        global $conn;
    
        try {
            $students_stmt = $conn->prepare(
                "SELECT id, nom, prenom, email, groupe FROM `students`"
            );
            $students_stmt->execute();
            $students_data = $students_stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $students = [];
    
            foreach ($students_data as $student_data) {
                $recours = getRecoursByStudentId($student_data['id']);
                $student = new Student(
                    $student_data['id'],
                    $student_data['nom'],
                    $student_data['prenom'],
                    $student_data['email'],
                    $student_data['groupe'],
                    $recours
                );
    
                $students[] = $student;
            }
    
            return $students;
    
        } catch(PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    function insertStudent($student) {
        global $conn;

        try {
            $insert_stmt = $conn->prepare(
                "INSERT INTO `students` (nom, prenom, email, groupe) VALUES (:nom, :prenom, :email, :groupe)"
            );

            $insert_stmt->bindParam(':nom', $student->nom);
            $insert_stmt->bindParam(':prenom', $student->prenom);
            $insert_stmt->bindParam(':email', $student->email);
            $insert_stmt->bindParam(':groupe', $student->groupe);

            $insert_stmt->execute();
            return $conn->lastInsertId();

        } catch(PDOException $e) {
            echo "Insert failed: " . $e->getMessage();
            return false;
        }
}
    
?>

