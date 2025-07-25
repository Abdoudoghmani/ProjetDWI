<?php
    require __DIR__.'/student/student-data.php';
    require __DIR__.'/recour/recour-data.php';
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
            <div class="input-group">
                <form action="listingplus.php" method="get">
                    <input name="search" type="search" placeholder="rechercher un etudiant...">
                </form>
                
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Groupe</th>
                        <th>Module</th>
                        <th>Nature de recour</th>
                        <th>Note affichee</th>
                        <th>Note reelle</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                        if(isset($_GET['search'])) {
                            $students = getStudents($_GET['search']);
                        } else {
                            $students = getAllStudents();
                        }
                        
                        foreach ($students as $student) {
                            // foreach ($student->recours as $recour) {
                                echo "<tr>";
                                echo "<td> ".$student->nom."</td>";
                                echo "<td> ".$student->prenom."</td>";
                                echo "<td> ".$student->email."</td>";
                                echo "<td> ".$student->groupe."</td>";
                                if (isset($student->recours[0])) {
                                    echo "<td> " . $student->recours[0]->module . "</td>";
                                    echo "<td> " . $student->recours[0]->nature . "</td>";
                                    echo "<td> " . $student->recours[0]->note_affiche . "</td>";
                                    echo "<td> " . $student->recours[0]->note_reel . "</td>";
                                } else {
                                    echo "<td> / </td>";
                                    echo "<td> / </td>";
                                    echo "<td> / </td>";
                                    echo "<td> / </td>";
                                }
                                echo "<td>
                                <select>
                                    <option></option>
                                    <option>Favorable</option>
                                    <option>Defavorable</option>
                                </select>
                                </td>";
                                echo "</tr>";
                            // }
                            
                        }

                        
                        

                    ?>

                        <!--- <td> <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">favorable</button>
                            <button type="button" class="btn btn-secondary">defavorable</button>
                        </div>
                        </td> -->
                    </tr>
                    <tr>

                        <!--<td> <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">favorable</button>
                            <button type="button" class="btn btn-secondary">defavorable</button>
                        </div>
                        </td>-->
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>