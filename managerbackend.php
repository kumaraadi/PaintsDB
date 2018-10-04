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
		$displayquery = "SELECT * FROM Salesperson_13156";
		$result = mysqli_query($conn, $displayquery);

		//if(mysqli_num_rows($result)){
		
			while($row = mysqli_fetch_array($result)){
				$data .= '<tr>
					<td>'.$row['userid'].'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['contactno'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['mid'].'</td>
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

if( isset($_POST['userid']) && isset($_POST['name']) && isset($_POST['contactno']) && isset($_POST['email']) && isset($_POST['mid']) && isset($_POST['password']))
{
echo ("hey");
	$query = "INSERT INTO Salesperson_13156 (`userid`, `name`, `contactno`, `email`, `mid`, `password`) VALUES ('$userid','$name','$contactno', '$email', '$mid', '$password'";
	$my_query = "INSERT INTO User_13156 (userid, password, userRole, active ) 
  			  VALUES('$userid', '$password', 'Salesperson', 'Yes')";
  			  mysqli_query($conn, $my_query);

		if($result = mysqli_query($conn,$query)){
			exit(mysqli_error());
		}else{
			echo "1 record added";
		}
	//mysqli_query($conn, $query);

}
}

// pass id on modal
if(isset($_POST['cid']) && isset($_POST['cid']) != "")
{
    $user_cid = $_POST['cid'];
    $query = "SELECT * FROM Customer_13156 WHERE cid = '$user_cid'";
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
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $mid = $_POST['mid'];
    

   

    $query = "UPDATE Salesperson_13156 SET userid = '$userid', name = '$name', contactno = '$contactno', email = '$email', mid = '$mid' WHERE userid = '$hidden_user_id'";
    mysqli_query($conn,$query);

}
/////////////Delete user record /////////


if(isset($_POST['deleteid']))
{

	$user_id = $_POST['deleteid']; 

	$deletequery = " DELETE from Salesperson_13156 where userid ='$user_id'";
	mysqli_query($conn,$deletequery);

}




//return var_dump($_POST);
?>