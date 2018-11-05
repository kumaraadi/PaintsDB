<?php

$connect = mysqli_connect("localhost", "root", "hello", "my_db");
$columns = array('id', 'cid', 'date', 'salesperson', 'product','quantity', 'rate', 'amount');

$query = "SELECT * FROM Table_13156 ";

 if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE id LIKE "%'.$_POST["search"]["value"].'%" 
 OR cid LIKE "%'.$_POST["search"]["value"].'%" OR product LIKE "%'.$_POST["search"]["value"].'%"';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div  class="update" data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="cid">' . $row["cid"] . '</div>';
 $sub_array[] = '<div  class="update" data-id="'.$row["id"].'" data-column="date">' . $row["date"] . '</div>';
 $sub_array[] = '<div class="update" data-id="'.$row["id"].'" data-column="salesperson">' . $row["salesperson"].'</div>';
 $sub_array[] = '<div class="update" data-id="'.$row["id"].'" data-column="product">' . $row["product"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="quantity">' . $row["quantity"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="rate">' . $row["rate"] . '</div>';
 $sub_array[] = '<div class="update" data-id="'.$row["id"].'" data-column="amount">' . $row["amount"] . '</div>';

 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM Table_13156";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
