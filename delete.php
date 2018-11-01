<?php
$connect = mysqli_connect("localhost", "root", "hello", "my_db");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM Table_13156 WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>