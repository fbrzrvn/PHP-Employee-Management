<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/login.css">
  <title>Log In</title>
</head>
<body>
<!-- section wrapper/container -->
<section class="login-container">
  <!-- validations alerts if errors while log in-->
  <?php
  //get error message from url
    if(isset($_GET['error'])){
      $error = $_GET['error'];
      if($error == 'emptyFields'){
        echo '<div class="alert alert-danger alert-dismissible fade show">
                  <strong>Error!</strong> Please fill in all fields.
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>';
      }
      else if($error == 'wrongCredentias'){
        echo '<div class="alert alert-danger alert-dismissible fade show">
                  <strong>Error!</strong> email or password are wrong.
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>';
      }
    }
  ?>
  <!-- Header -->
  <h1 class="header-img">Log in</h1>
  <!-- Log in form -->
  <form action="src/library/loginController.php" method="post">
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" name="email" placeholder="email" class="form-control">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="password" class="form-control">
    </div>
    <input type="submit" name="login" value="Log In" class="btn btn-info">
  </form>
</section>
<!--Bootstrap scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>