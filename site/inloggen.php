

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
</head>
<body>

    <div class="login-container">
    <h1>Login</h1>
    <form action="ingelogd.php" method="POST">
      <input type="email" name="email" placeholder="email" required>
      <input type="password" name="wachtwoord" placeholder="wachtwoord" required>
      <button type="submit">Login</button>
    </form>

			</div>
</body>
</html>