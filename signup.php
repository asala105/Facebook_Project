<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Signup</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="img/logo.svg" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Signup</h1>
            <form id="signupForm" action="php/signup.php" method="POST">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                <p id="fname_valid" style="color: red"></p>
              </div>
              <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                <p id="lname_valid" style="color: red"></p>
              </div>
              <div class="form-group">
              <label for="last_name">Gender</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Male
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="1" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Female
                </label>
              </div>
              </div>
              <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Birthday">
                <p id="BD_valid" style="color: red"></p>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
                <p id="email_valid" style="color: red"></p>
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your password">
                <p id="password_valid" style="color: red"></p>
              </div>
              <div class="form-group mb-4">
                <label for="password_confirm">Confirm Password</label>
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm password">
                <p id="password_confirm_valid" style="color: red"></p>
              </div>
              <input name="signup" id="signup" class="btn btn-block login-btn" type="button" value="Signup">
            </form>
            <a href="#!" class="forgot-password-link">Forgot password?</a>
            <p class="login-wrapper-footer-text">Already have an account? <a href="index.php" class="text-reset">Login here</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="img/login.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
