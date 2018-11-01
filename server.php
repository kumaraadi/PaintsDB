<?php
session_start();


$userid = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', "hello", 'my_db');

// Sales Person Registration
if (isset($_POST['reg_user1'])) {
  $userid = mysqli_real_escape_string($db, $_POST['userid']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $contactno = mysqli_real_escape_string($db, $_POST['contactno']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mid = mysqli_real_escape_string($db, $_POST['mid']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($userid)) { array_push($errors, "User ID is required"); }
  if (empty($mid)) { array_push($errors, "Manager ID is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  

  $user_check_query = "SELECT * FROM User_13156 WHERE userid='$userid' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['userid'] === $userid) {
      array_push($errors, "userid already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }


  if (count($errors) == 0) {
    $my_query = "INSERT INTO Salesperson_13156 (userid, name, contactno, email, mid ) 
          VALUES('$userid', '$name', '$contactno', '$email', '$mid')";
          mysqli_query($db, $my_query);
  	$query = "INSERT INTO User_13156 (userid, password, userRole, active ) 
  			  VALUES('$userid', '$password', 'Salesperson', 'Yes')";
  	mysqli_query($db, $query);
  	
  	header('location: login.php');
  }
}

//Register Sales Manager

if (isset($_POST['reg_user2'])) {
  $userid = mysqli_real_escape_string($db, $_POST['userid']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $contactno = mysqli_real_escape_string($db, $_POST['contactno']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $shopname = mysqli_real_escape_string($db, $_POST['shopname']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($userid)) { array_push($errors, "User ID is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  

  $user_check_query = "SELECT * FROM User_13156 WHERE userid='$userid' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['userid'] === $userid) {
      array_push($errors, "userid already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {

    $query = "INSERT INTO User_13156 (userid, password, userRole, active ) 
          VALUES('$userid', '$password', 'Manager', 'Yes')";
    mysqli_query($db, $query);
    $_SESSION['userid'] = $userid;
    $_SESSION['success'] = "You are now logged in";
    header('location: home1.php');
  }
}



// LOGIN USER
if (isset($_POST['login_user'])) {

  $userid = mysqli_real_escape_string($db, $_POST['userid']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($userid)) {
    array_push($errors, "userid is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  
      
  

  if (count($errors) == 0) {
    $query = "SELECT * FROM User_13156 WHERE userid='$userid' AND password='$password'";
    $results = mysqli_query($db, $query);
      
        if($userid=="admin" && $password=="admin"){
            header('location: admin.php');
        }
        else if (mysqli_num_rows($results) == 1) {
      $_SESSION['userid'] = $userid;
      $_SESSION['success'] = "You are now logged in";
      $query = "SELECT * FROM User_13156 WHERE userid = '$userid' AND userRole = 'Manager'";
      $results = mysqli_query($db, $query);
        
        if(mysqli_num_rows($results) == 1){
          header('location: manager.php');
        }else{
          header('location: Salesperson2.php');
        }
      
    }else {
      array_push($errors, "Wrong userid/password combination");
    }
  }
}

?>
