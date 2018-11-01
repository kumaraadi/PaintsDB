<?php
$connect = mysqli_connect("localhost", "root", "hello", "my_db");
if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $column_name = $_POST["column_name"];

$var = $_POST["id"];

 
 
 
 


 if($_POST["column_name"] == "rate" || $_POST["column_name"] == "quantity"){
 	if($_POST["column_name"] == "rate"){
 	
 		$query1 = "SELECT quantity from Table_13156 WHERE id = '$var'";

 		$result = mysqli_query($connect, $query1);
 		if ($row = $result->fetch_assoc()) {
 			$quan = $row['quantity'];
 		}

 		$result = floatval($quan) * floatval($value);
 		echo $result;
 		$query = "UPDATE Table_13156 SET ".$_POST["column_name"]."='".$value."', amount = '".$result."' WHERE id = '".$_POST["id"]."'";
 		if(mysqli_query($connect, $query)){
 			echo "Data Updated";
 		}else{
 			echo "Data couldn't updated.";
 		}
 	}else{
 		$query1 = "SELECT rate from Table_13156 WHERE id = '$var'";

 		$result = mysqli_query($connect, $query1);
 		if ($row = $result->fetch_assoc()) {
 			$rate = $row['rate'];
 		}

 		$result = floatval($value) * floatval($rate);
 		$query = "UPDATE Table_13156 SET ".$_POST["column_name"]."='".$value."', amount = '".$result."' WHERE id = '".$_POST["id"]."'";
 		if(mysqli_query($connect, $query)){
 			echo "Data Updated";
 		}else{
 			echo "Data couldn't updated.";
 		}
 	}

 	//$query = "UPDATE Table_13156 SET '$column_name'='".$value."' WHERE id = '".$_POST["id"]."'";
 }else{
 	$query = "UPDATE Table_13156 SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 	if(mysqli_query($connect, $query))
 	{
  		echo 'Data Updated';
 	}
 }
 
}
?>