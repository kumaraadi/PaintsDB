<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sales Manager Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Manager Sign Up</h2>
  </div>
	
  <form method="post" action="registration2.php">
    <?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>User ID</label>
  	  <input type="text" name="userid" id="userid">
  	</div>
  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" id="name">
  	</div>
  	<div class="input-group">
  	  <label>Contact No</label>
  	  <input type="text" name="contactno" id="contactno">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="text" name="email" id="email">
  	</div>
    <div class="input-group">
      <label>Shop Name</label>
      <input type="text" name="shopname" id="shopname">
    </div>
    <div class="input-group">
      <label>Shop Address</label>
      <input type="text" name="shopaddress" id="shopaddress">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" id="password">
    </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user2">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>