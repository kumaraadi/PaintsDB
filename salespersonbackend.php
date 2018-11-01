<?php

include"conn.php";

extract($_POST);

if(isset($_POST['readrecord'])){

	$data = '<table class="table table-bordered table-striped">
				<tr>
					<th>ID</th>
					<th>sname</th>
					<th>Contact No</th>
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
					<td>'.$row['sname'].'</td>
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

if( isset($_POST['userid']) && isset($_POST['sname']) && isset($_POST['contactno']) && isset($_POST['email']) && isset($_POST['mid']))
{
	$query = "INSERT INTO Salesperson_13156 (`userid`, `sname`, `contactno`, `email`, `mid`) VALUES ('$userid','$sname','$contactno', '$email', '$mid')";

		mysqli_query($conn,$query);
	

}
}

// pass id on modal
if(isset($_POST['userid']) && isset($_POST['userid']) != "")
{
    $userid = $_POST['userid'];
    $query = "SELECT * FROM Salesperson_13156 WHERE userid = '$userid'";
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
    $sname = $_POST['sname'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $mid = $_POST['mid'];
   
echo "querry runs";
   

    $query = "UPDATE Salesperson_13156 SET userid = '$userid', sname = '$sname', contactno = '$contactno', email = '$email' WHERE userid = '$hidden_user_id'";
    mysqli_query($conn,$query);

}
/////////////Delete user record /////////


if(isset($_POST['deleteid']))
{

	$userid = $_POST['deleteid']; 

	$deletequery = " DELETE from Salesperson_13156 where userid ='$userid'";
	mysqli_query($conn,$deletequery);

}




//return var_dump($_POST);
?>