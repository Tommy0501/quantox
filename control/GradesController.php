<?php

class GradesController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        $student_id = $inputData['student_id'];
        $subject = $inputData['subject'];
        $grade = $inputData['grade'];

        $insert_student = "INSERT INTO list_of_grades (student_id,subject,grade) VALUES ('$student_id','$subject','$grade')";
        $result = $this->conn->query($insert_student);
        if($result){
            return true;
        }else{
            return false;
        }
    }

}
?>