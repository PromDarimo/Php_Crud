<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Week 4 - Students</title>
    </head>
    <body>
        <div class="container">
            <h1>Student list</h1>

            <div class="col-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th>
                                <a href="create.php" class="btn btn-primary">+ New</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_SESSION['students'])) {
                                $i = 1;
                                foreach ($_SESSION['students'] as $student) {
                                    echo '
                                        <tr>
                                            <td scope="row">' . $i++ . '</td>
                                            <td>' . $student['fullname'] . '</td>
                                            <td>' . $student['gender'] . '</td>
                                            <td>' . $student['address'] . '</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Student Action">
                                                    <a href="edit_student.php" class="btn btn-default">Edit</a>
                                                    <a href="" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    ';
                                }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
    </body>
</html>