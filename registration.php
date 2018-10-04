<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sales Person Regitration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Salesperson Sign Up</h2>
  </div>
	
  <form method="post" action="registration.php">
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
      <label>User ID of Manager</label>
      <input type="text" name="mid" id="mid">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" id="password">
    </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user1">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>