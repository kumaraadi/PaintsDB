<<?php 
	$connect = mysqli_connect("localhost", "root", "hello", "my_db");
$query ="SELECT name from Salesperson_13156";

if (!$result = mysqli_query($connect,$query)) {
        exit(mysqli_error());
    }
    
    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
       
            array_push($response, $row);
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }


    echo json_encode($response);


 ?>