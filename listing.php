<?php
    require __DIR__.'/student/student-data.php';
?>

<!DOCTYPE html>
<html lang="en" title="Coding design">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List des Etudiants</title>
    <link rel="stylesheet" href="styleListing.css">
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>List des Etudiants</h1>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Nom </th>
                        <th> Prenom </th>
                        <th> Email </th>
                        <th> Groupe </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($_GET['search'])) {
                            $students = getStudents($_GET['search']);
                        } else {
                            $students = getAllStudents();
                        }
                        
                        foreach ($students as $student) {
                            echo "<tr>";
                            echo "<td> ".$student->nom."</td>";
                            echo "<td> ".$student->prenom."</td>";
                            echo "<td> ".$student->email."</td>";
                            echo "<td> ".$student->groupe."</td>";
                            echo "</tr>";
                        }

                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>