<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  
  
      <link rel="stylesheet" href="assets/css/style2.css">

  
</head>

<body>
  <body class="align">

  <div class="grid">

    <form action="login_act.php" method="post" class="form login">

      <header class="login__header">
        <h3 class="login__title">Login</h3>
      </header>

      <div class="login__body">

        <div class="form__field">
          <input type="username" placeholder="uname" name="uname" required>
        </div>

        <div class="form__field">
          <input type="password" placeholder="Password" name="pass" required>
        </div>

      </div>

      <footer class="login__footer">
        <input type="submit" value="Login">

        <p><span class="icon icon--info">?</span><a href="#">Forgot Password</a></p>
      </footer>

    </form>

  </div>

</body>
  
  
</body>
</html>
