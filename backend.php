<?php

include"conn.php";

extract($_POST);

if(isset($_POST['readrecord'])){

	$data = '<table class="table table-bordered table-striped">
				<tr>
					<th>ID</th>
					<th>Shop Name</th>
					<th>Customer Name</th>
					<th>Contact No</th>
					<th>Address</th>
					<th>Area</th>
					<th>City</th>
					<th>Edit Action</th>
					<th>Delete Action</th>
				</tr>';
		$displayquery = "SELECT * FROM Customer_13156";
		$result = mysqli_query($conn, $displayquery);

		//if(mysqli_num_rows($result)){
		
			while($row = mysqli_fetch_array($result)){
				$data .= '<tr>
					<td>'.$row['cid'].'</td>
					<td>'.$row['shopname'].'</td>
					<td>'.$row['custname'].'</td>
					<td>'.$row['contactno'].'</td>
					<td>'.$row['address'].'</td>
					<td>'.$row['area'].'</td>
					<td>'.$row['city'].'</td>
					<td>
						<button onclick="GetUserDetails('.$row['cid'].')"
						class="btn btn-warning">Edit</button>
					</td>
					<td>
						<button onclick="DeleteUser('.$row['cid'].')"
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

if(isset($_POST['shopname']) && isset($_POST['custname']) && isset($_POST['contactno']) && isset($_POST['address']) && isset($_POST['area']) && isset($_POST['city']))
{

	$query = "INSERT INTO Customer_13156 (`shopname`, `custname`, `contactno`, `address`, `area`, `city`) VALUES ('$shopname','$custname', '$contactno', '$address', '$area', '$city')";

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
    $shopname = $_POST['shopname'];
    $custname = $_POST['custname'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    $city = $_POST['city'];

   

    $query = "UPDATE Customer_13156 SET shopname = '$shopname', custname = '$custname', contactno = '$contactno', address = '$address', area = '$area', city = '$city' WHERE cid = '$hidden_user_id'";
    mysqli_query($conn,$query);

}
/////////////Delete user record /////////


if(isset($_POST['deleteid']))
{

	$user_id = $_POST['deleteid']; 

	$deletequery = " DELETE from Customer_13156 where cid ='$user_id'";
	mysqli_query($conn,$deletequery);

}




//return var_dump($_POST);
?>