<?php

include"conn.php";

extract($_POST);

if(isset($_POST['readrecord'])){

	$data = '<table class="table table-bordered table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Manager ID</th>
					<th>Edit Action</th>
					<th>Delete Action</th>
				</tr>';
		$displayquery = "SELECT * FROM Manager_13156";
		$result = mysqli_query($conn, $displayquery);

		//if(mysqli_num_rows($result)){
		
			while($row = mysqli_fetch_array($result)){
				$data .= '<tr>
					<td>'.$row['mid'].'</td>
					<td>'.$row['mname'].'</td>
					<td>'.$row['contactno'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['address'].'</td>
					<td>
						<button onclick="GetUserDetails('.$row['mid'].')"
						class="btn btn-warning">Edit</button>
					</td>
					<td>
						<button onclick="DeleteUser('.$row['mid'].')"
						class="btn btn-danger">Delete</button>
					</td>

					</td>
					</tr>';
			}
		//}
		$data .= '</table>';
			echo $data;


}


//Adding records
if(!isset($_POST['hidden_user_id'])){

if(isset($_POST['mname']) && isset($_POST['contactno']) && isset($_POST['email']) && isset($_POST['address']))
{
	echo "Hello";
	$query = "INSERT INTO Manager_13156 
	(`mname`, `contactno`, `email`, `address`)
	 VALUES 
	 ('$mname','$contactno', '$email', '$address')";

			mysqli_query($conn,$query);
		
}
}

// pass id on modal
if(isset($_POST['mid']) && isset($_POST['mid']) != "")
{
    $mid = $_POST['mid'];
    $query = "SELECT * FROM Manager_13156 WHERE mid = '$mid";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
    
    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
       
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }


    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}



//////////////// update table//////////////
if(isset($_POST['hidden_user_id'])){

	
    // get values
    $hidden_user_id = $_POST['hidden_user_id'];
    $mid = $_POST['mid'];
    $mname = $_POST['mname'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    

   

    $query = "UPDATE Manager_13156 SET mname = '$mname', contactno = '$contactno', email = '$email', address = '$address' WHERE mid = '$hidden_user_id'";
    mysqli_query($conn,$query);

}
/////////////Delete user record /////////


if(isset($_POST['deleteid']))
{

	$mid = $_POST['deleteid']; 

	$deletequery = " DELETE from Manager_13156 where mid ='$mid'";
	mysqli_query($conn,$deletequery);

}




//return var_dump($_POST);
?>