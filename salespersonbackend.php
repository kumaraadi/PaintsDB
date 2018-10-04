<?php

include"conn.php";

extract($_POST);

if(isset($_POST['readrecord'])){

	$data = '<table class="table table-bordered table-striped">
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Brand</th>
					<th>Type</th>
					<th>Shade</th>
					<th>Size</th>
					<th>Selling Price</th>
					<th>Edit Action</th>
					<th>Delete Action</th>
				</tr>';
		$displayquery = "SELECT * FROM Product_13156";
		$result = mysqli_query($conn, $displayquery);

		//if(mysqli_num_rows($result)){
		
			while($row = mysqli_fetch_array($result)){
				$data .= '<tr>
					<td>'.$row['pcode'].'</td>
					<td>'.$row['pname'].'</td>
					<td>'.$row['brand'].'</td>
					<td>'.$row['type'].'</td>
					<td>'.$row['shade'].'</td>
					<td>'.$row['size'].'</td>
					<td>'.$row['sellingprice'].'</td>
					<td>
						<button onclick="GetUserDetails('.$row['pcode'].')"
						class="btn btn-warning">Edit</button>
					</td>
					<td>
						<button onclick="DeleteUser('.$row['pcode'].')"
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

if( isset($_POST['pcode']) && isset($_POST['pname']) && isset($_POST['brand']) && isset($_POST['type']) && isset($_POST['shade']) && isset($_POST['size']) && isset($_POST['sellingprice']))
{

	$query = "INSERT INTO Product_13156 (`pcode`, `pname`, `brand`, `type`, `shade`, `size`, `sellingprice`) VALUES ('$pcode','$pname','$brand', '$type', '$shade', '$size', '$sellingprice')";

		if($result = mysqli_query($conn,$query)){
			exit(mysqli_error());
		}else{
			echo "1 record added";
		}
	//mysqli_query($conn, $query);

}
}

// pass id on modal
if(isset($_POST['userid']) && isset($_POST['userid']) != "")
{
    $user_cid = $_POST['userid'];
    $query = "SELECT * FROM Product_13156 WHERE cid = '$user_cid'";
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
    $pname = $_POST['pname'];
    $brand = $_POST['br'];
    $type = $_POST['type'];
    $shade = $_POST['shade'];
    $size = $_POST['size'];
    $sellingprice = $_POST['sellingprice'];

   

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