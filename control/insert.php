<?php
session_start();

include ('../config/DatabaseConnection.php');
include ('../control/StudentController.php');

$db = new DatabaseConnection;

if(isset($_POST['save_student']))
{
    $inputData = [
        'full_name' => mysqli_real_escape_string($db->conn,$_POST['full_name']),
        'school_board' => mysqli_real_escape_string($db->conn,$_POST['school_board']),

    ];

    $student = new StudentController;
    $result = $student->create($inputData);

    if($result)
    {
        $_SESSION['message'] = "Student Added Successfully";
        header("Location: ../student-add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header("Location: ../student-add.php");
        exit(0);
    }
}
?>