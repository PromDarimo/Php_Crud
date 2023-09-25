<?php
    if(session_status() === PHP_SESSION_NONE ){
        session_start();
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
    switch($from){
        case 'create' :{
                $_SESSION['students'][] = [
                    'fullname' => $_POST['fullname'],
                    'gender' => $_POST['gender'],
                    'address' => $_POST['address']
                ];
            break;
        }
        case 'edit' :{
            
        }
    }
    header('Location: student.php');
    exit();

?>