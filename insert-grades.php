<?php
include "config/connection.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student-add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <?php
            if(isset($_SESSION['message']))
            {
                echo "<h5>".$_SESSION['message']."</h5>";
                unset($_SESSION['message']);
            }
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>Grades Add</h4>
                </div>
                <div class="card-body">

                    <form action="control/insert_grades.php" method="POST">

                        <div class="mb-3">
                            <label for="">School Board</label>
                            <select name="student_id" required class="form-control">
                                <option>Choose one student</option>
                                <?php
                                $SqlU = "SELECT * FROM students ";
                                $resultU = mysqli_query($db_connection, $SqlU);
                                while ($rowsU = mysqli_fetch_array($resultU))
                                {
                                    $id = $rowsU['id'];
                                    $full_name = $rowsU['full_name'];

                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $full_name; ?></option>
                                <?php } ?>

                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="">Insert subject</label>
                            <input type="text" name="subject" required class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Insert grade</label>
                            <input type="text" name="grade" required class="form-control" />
                        </div>
                        <div class="mb-3 ">
                            <button type="submit" name="save_grade" class="btn btn-success">Insert Student Grade</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>