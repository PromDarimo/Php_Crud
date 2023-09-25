<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    // $_SESSION['students'] = [];
}

//check if submit if not by POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //return to student page
    header('Location: student.php');
    exit();
}

if (!isset($_SESSION['students'])) {
    //check is session student is null
    $_SESSION['students'] = [];
}

$from = $_POST['from'];
switch ($from) {
    case 'create': {
            $newId = count($_SESSION['students']) + 1;
            $_SESSION['students'][$newId] = [
                'id' => $newId,
                'fullname' => $_POST['fullname'],
                'gender' => $_POST['gender'],
                'address' => $_POST['address']
            ];
            break;
        }
    case 'update': {
            // id student get from student.php page
            $selectedId = $_POST['id'];
            $_SESSION['students'][$selectedId] = [
                'id' => $selectedId,
                'fullname' => $_POST['fullname'],
                'gender' => $_POST['gender'],
                'address' => $_POST['address']
            ];
        }
    case 'delete': {
            unset($_SESSION['students'][$_POST['id']]);
            break;
        }
}
header('Location: student.php');
exit();

?>