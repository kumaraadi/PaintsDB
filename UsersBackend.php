<?php

include"conn.php";

extract($_POST);

if(isset($_POST['readrecord'])){

	$data = '<table class="table table-bordered table-striped">
				<tr>
					<th>ID</th>
					<th>Password</th>
					<th>User Type</th>
					<th>Active</th>
					<th>Edit Action</th>
					<th>Delete Action</th>
				</tr>';
		$displayquery = "SELECT * FROM User_13156";
		$result = mysqli_query($conn, $displayquery);

		//if(mysqli_num_rows($result)){
		
			while($row = mysqli_fetch_array($result)){
				$data .= '<tr>
					<td>'.$row['userid'].'</td>
					<td>'.$row['password'].'</td>
					<td>'.$row['userRole'].'</td>
					<td>'.$row['active'].'</td>
					<td>
						<button onclick="GetUserDetails('.$row['userid'].')"
						class="btn btn-warning">Edit</button>
					</td>
					<td>
						<button onclick="DeleteUser('.$row['userid'].')"
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

if(isset($_POST['password']) && isset($_POST['userRole']) && isset($_POST['active']))
{
	$query = "INSERT INTO User_13156 (`password`, `userRole`, `active`) VALUES ('$password','$userRole', '$active')";

		mysqli_query($conn,$query);
	

}
}

// pass id on modal
if(isset($_POST['userid']) && isset($_POST['userid']) != "")
{
    $userid = $_POST['userid'];
    $query = "SELECT * FROM User_13156 WHERE userid = '$userid'";
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
   
    $password = $_POST['password'];
    $userRole = $_POST['userRole'];
    $active = $_POST['active'];
    

   

    $query = "UPDATE User_13156 SET  password = '$password', userRole = '$userRole', active = '$active' WHERE userid = '$hidden_user_id'";
    mysqli_query($conn,$query);

}
/////////////Delete user record /////////


if(isset($_POST['deleteid']))
{

	$userid = $_POST['deleteid']; 

	$deletequery = " DELETE from User_13156 where userid ='$userid'";
	mysqli_query($conn,$deletequery);

}




//return var_dump($_POST);
?>