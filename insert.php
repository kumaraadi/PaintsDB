<?php
$connect = mysqli_connect("localhost", "root", "hello", "my_db");
extract($_POST);

if(isset($_POST["cid"], $_POST["date"], $_POST["salesperson"], $_POST["product"], $_POST["quantity"], $_POST["rate"]))
{
 //$first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);
 //$last_name = mysqli_real_escape_string($connect, $_POST["last_name"]);

 $query = "INSERT INTO Table_13156(cid, date, salesperson, product, quantity, rate, amount) VALUES('$cid', '$date', '$salesperson','$product','$quantity','$rate', '$quantity'*'$rate')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
