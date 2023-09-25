<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $selectedId = intval($_GET['id'] ?? 0);
    if ($selectedId === 0) {
        header("Location: students.php");
        exit();
    }

    $student = [];
    foreach ($_SESSION['students'] as $key => $stu) {
        if ($key === $selectedId) {
            $student = $stu;
        }
    }

    if (!count($student)) {
        header("Location: students.php");
        exit();
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Week 4 - Edit Student</title>
    </head>
    <body>
        <div class="container">
            <h1>Edit Student</h1>

            <div class="col-4">
                <form action="actions.php" method="POST">
                    <input type="hidden" name="from" value="update"/>

                    <!-- id student get from student.php page -->
                    <input type="hidden" name="id" value="<?=$selectedId?>"/>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Fullname *</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $student['fullname'] ?>" placeholder="Last name First Name">
                    
                    </div>

                    <div class="mb-3">
                        <label for="input2" class="form-label">Gender *</label>
                        <select name="gender" class="form-select" aria-label="---select a gender---">
                            <option selected>---select a gender---</option>
                            <option <?php if ($student['gender'] === 'Male') { echo 'selected'; } ?> value="Male">Male</option>
                            <option <?php if ($student['gender'] === 'Female') { echo 'selected'; } ?> value="Female">Female</option>
                            <option <?php if ($student['gender'] === 'Other not mention') { echo 'selected'; } ?> value="Other not mention">Other not mention</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Address *</label>
                        <textarea class="form-control" name="address" id="address"><?php echo $student['address'] ?></textarea>
                       
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
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