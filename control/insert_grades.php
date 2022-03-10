<?php
session_start();

include ('../config/DatabaseConnection.php');
include ('../control/GradesController.php');

$db = new DatabaseConnection;

if(isset($_POST['save_grade']))
{
    $inputData = [
        'student_id' => mysqli_real_escape_string($db->conn,$_POST['student_id']),
        'subject' => mysqli_real_escape_string($db->conn,$_POST['subject']),
        'grade' => mysqli_real_escape_string($db->conn,$_POST['grade']),
    ];

    $grades = new GradesController;
    $result = $grades->create($inputData);

    if($result)
    {
        $_SESSION['message'] = "Grade Added Successfully";
        header("Location: ../insert-grades.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header("Location: ../insert-grades.php");
        exit(0);
    }
}
?>