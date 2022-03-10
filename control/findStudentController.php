<?php

class findStudentController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function search($student)
    {

        $query = "SELECT * FROM students WHERE id like '%$student%'";

        $result = $this->conn->query($query);

        $num_result = $result->num_rows;

        if ($num_result > 0) {
            while ($rows = $result->fetch_assoc()) {
                $this->data[] = $rows;
                if($sb_id = $rows['sb_id']==1)
                {
//                    echo "csm";
                    $emparray[] = $rows;
                    echo json_encode($emparray);

                }
                else
                {
                    echo "csmb";
                }
//                print_r($rows);
            }
            return $this->data;
        }
    }
}

