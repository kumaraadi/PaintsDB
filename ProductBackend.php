<?php

include"conn.php";

extract($_POST);

if(isset($_POST['readrecord'])){

	$data = '<table class="table table-bordered table-striped">
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Brand</th>
					<th>Type</th>
					<th>Shade</th>
					<th>Size</th>
					<th>Price</th>
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
					<td>'.$row['ptype'].'</td>
					<td>'.$row['shade'].'</td>
					<td>'.$row['psize'].'</td>
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

if( isset($_POST['pname']) && isset($_POST['brand']) && isset($_POST['ptype']) && isset($_POST['shade']) && isset($_POST['psize']) && isset($_POST['sellingprice']) )
{
	$query = "INSERT INTO Product_13156 (`pname`, `brand`, `ptype`, `shade`, `psize`, `sellingprice`) VALUES ('$pname','$brand','$ptype', '$shade', '$psize', '$sellingprice')";

		mysqli_query($conn,$query);
	

}
}

// pass id on modal
if(isset($_POST['userid']) && isset($_POST['userid']) != "")
{
    $userid = $_POST['userid'];
    $query = "SELECT * FROM Product_13156 WHERE pcode = '$userid'";
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
    $brand = $_POST['brand'];
    $ptype = $_POST['ptype'];
    $shade = $_POST['shade'];
    $psize = $_POST['psize'];
    $sellingprice = $_POST['sellingprice'];
   

   

    $query = "UPDATE Product_13156 SET pname = '$pname', brand = '$brand', ptype = '$ptype', shade = '$shade', psize = '$psize', sellingprice = $sellingprice WHERE pcode = '$hidden_user_id'";
    mysqli_query($conn,$query);

}
/////////////Delete user record /////////


if(isset($_POST['deleteid']))
{

	$userid = $_POST['deleteid']; 

	$deletequery = " DELETE from Product_13156 where pcode ='$userid'";
	mysqli_query($conn,$deletequery);

}




//return var_dump($_POST);
?>