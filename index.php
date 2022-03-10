<?php
include "config/connection.php";

$sql = "select * from students";
$result = mysqli_query($db_connection, $sql) or die("Error " . mysqli_error($db_connection));


$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}
echo json_encode($emparray);

//close the db connection
mysqli_close($db_connection);
?>


