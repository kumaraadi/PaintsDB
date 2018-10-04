<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Login</h2>
  </div>
   
  <form method="post" action="login.php">
    <?php include('errors.php'); ?> 

    <div class="input-group">
      <label>User ID</label>
      <input type="text" name="userid" id="userid" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" id="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      <a href="registration.php">Sign up (Sales Person)</a>
      <a href="registration2.php">Sign up (Sales Manager)</a>
    </p>
  </form>
</body>
</html>