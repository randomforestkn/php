<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
guestsOnly();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <!--  Font Awesome -->
  <script src="https://kit.fontawesome.com/49cbaeff60.js" crossorigin="anonymous"></script>

  <!--  Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,562;0,600;0,700;1,400;1,500;1,562;1,600;1,700&display=swap" rel="stylesheet">

  <!--  Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title>Regsiter</title>
</head>

<body>

  <!-- Header include-->
  <?php include(ROOT_PATH .  "/app/includes/header.php"); ?>

  <div class="auth-content">

    <form action="register.php" method="post">
      <h2 class="form-title">Register</h2>

      <!-- validation error-->
        <?php include(ROOT_PATH .  "/app/helpers/formErrors.php"); ?>



      <div>
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
      </div>

      <div>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
      </div>

      <div>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
      </div>

      <div>
        <label>Password Confirmation</label>
        <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
      </div>

      <div>
        <button class="btn btn-big" type="submit" name="register-btn">Register</button>
      </div>

      <p>Or <a href="<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>

    </form>

  </div>


  <!--  JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


  <!--  Custom Script -->
  <script src="assets/js/scripts.js"> </script>
</body>

</html>
