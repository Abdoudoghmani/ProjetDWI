<?php 
    require '../connect_bdd.php';
    require './student.php';

    function getStudent($id) {
        global $conn;

        try {
            $student_stmt = $conn->prepare(
                "SELECT id, nom, prenom, email, groupe FROM `students` where id = :id"
            );
            $student_stmt->bindParam(':id', $id);
            $student_stmt->execute();
            $student_data = $student_stmt->fetch(PDO::FETCH_ASSOC);

            if ($student_data) {
                $student = new Student(
                    $student_data['id'],
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
                "SELECT id, nom, prenom, email, groupe FROM `students`"
            );
            $students_stmt->execute();
            $students_data = $students_stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $students = [];
    
            foreach ($students_data as $student_data) {
                $student = new Student(
                    $student_data['id'],
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
    
?>

