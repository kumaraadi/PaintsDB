<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
  <title>Login/Signup</title>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <div class="header">
    <h2>Login</h2>
  </div>
   
  <form method="post" action="login.php">
    <?php include('errors.php'); ?> 
<br />
    <div class="input-group">
      <label>User ID</label>
      <input type="text" name="userid" id="userid" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" id="password">
    </div>
    <br />
    <div class="input-group"><center>
      <button type="submit" class="mybutton" name="login_user">Login</button></center>
    </div>
    <br></br>
      
  </form>
</body>
</html> 