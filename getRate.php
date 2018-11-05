<?php

$connect = mysqli_connect("localhost", "root", "hello", "my_db");

$pcode = $_POST["s_pcode"];
$query = "SELECT * FROM Product_13156 WHERE pcode = '$pcode'";

$result = mysqli_query($connect, $query); 

$response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
       
            $response = $row;
        }
    }
    


    echo json_encode($response);
?>
