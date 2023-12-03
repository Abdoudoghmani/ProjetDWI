<?php 
    require dirname(__DIR__).'/connect_bdd.php';
    require __DIR__.'/student.php';

    function getStudent($id) {
        global $conn;

        try {
            $student_stmt = $conn->prepare(
                "SELECT nom, prenom, email, groupe FROM `students` where id = :id"
            );
            $student_stmt->bindParam(':id', $id);
            $student_stmt->execute();
            $student_data = $student_stmt->fetch(PDO::FETCH_ASSOC);

            if ($student_data) {
                $student = new Student(
                    $student_data['nom'],
                    $student_data['prenom'],
                    $student_data['email'],
                    $student_data['groupe']
                );
                return $student;

            } else {
                echo "Student not found";
            }

          } catch(PDOException $e) {
            echo "Query failed: " . $e->getMessage();
          }
    }

    function getAllStudents() {
        global $conn;
    
        try {
            $students_stmt = $conn->prepare(
                "SELECT nom, prenom, email, groupe FROM `students`"
            );
            $students_stmt->execute();
            $students_data = $students_stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $students = [];
    
            foreach ($students_data as $student_data) {
                $student = new Student(
                    $student_data['nom'],
                    $student_data['prenom'],
                    $student_data['email'],
                    $student_data['groupe']
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

        } catch(PDOException $e) {
            echo "Insert failed: " . $e->getMessage();
            return false;
        }
}
    
?>

