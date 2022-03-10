<?php

class StudentController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        $full_name = $inputData['full_name'];
        $school_board = $inputData['school_board'];


        $insert_student = "INSERT INTO students (full_name,sb_id) VALUES ('$full_name','$school_board')";
        $result = $this->conn->query($insert_student);
        if($result){
            return true;
        }else{
            return false;
        }
    }

}
?>