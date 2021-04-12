<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>

    <!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="shortcut icon" href="logo.jpg">
<link href="css/login.css" rel="stylesheet" type="text/css">
  </head>
  <body class="my-login-page">
      <section class="h-100">
          <div class="container h-100">
              <div class="row justify-content-md-center h-100">
                  <div class="card-wrapper">
                      <div class="brand">
                          <img src="images/logo.jpg" alt="logo">
                      </div>
                      <h4 class="card-title" style="text-align: center;">Company Name</h4>
                      <br>
                      <div class="card fat">
                          <div class="card-body">
                              <h4 class="card-title">Login</h4>
                              <form method="POST" class="my-login-validation" action="alog.php" novalidate="">
                                  <div class="form-group">
                                      <label for="name">User Name</label>
                                      <input id="email" type="text" class="form-control" name="username" value="admin" required autofocus>
                                      <div class="invalid-feedback">
                                          Username is invalid
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="password">Password
                                          <a href="forgot.php" class="float-right">
                                              Forgot Password?
                                          </a>
                                      </label>
                                      <input id="password" type="password" class="form-control" name="password" value="admin" required data-eye>
                                      <div class="invalid-feedback">
                                          Password is required
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="custom-checkbox custom-control">
                                          <!--<input type="checkbox" name="remember" id="remember" class="custom-control-input">-->
                                          <!-- <label for="remember" class="custom-control-label">Remember Me</label> -->
                                      </div>
                                  </div>

                                  <div class="form-group m-0">
                                      <input type="submit" name="login"class="btn btn-primary btn-block" value="Login">

                                      <!--</button>-->
                                  </div>
                                  <!-- <div class="mt-4 text-center">
                                          Don't have an account? <a href="register.html">Create One</a>
                                  </div> -->
                              </form>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </section>
      <script src="js/jquery-3.6.0.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/login.js"></script>
  </body>
</html>
