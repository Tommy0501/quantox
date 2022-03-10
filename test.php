<?php

session_start();

include('config/DatabaseConnection.php');
include('control/findStudentController.php');

$db = new DatabaseConnection;

$findStudent = new findStudentController();

$student = $_GET['student'];

$res = $findStudent->search($student);

?>
