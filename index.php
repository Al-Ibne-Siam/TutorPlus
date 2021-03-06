
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Tutor Plus</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />

  <link rel="icon" href="pic\favicon.svg">
  <link rel="stylesheet" href="css/styles.css">

</head>

<body>

  <div class="header">
    <a href="index.html">
      <img class="logo" src="pic\logo.svg" alt="logo">
    </a>
  </div>

  <!--upper-body-->
  <div class="upper-body">

    <div class="container">
      <!--creates a row-->
      <div class="row">
        <!--creates a large column-->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <p class="description">
            Tired of hunting for tuition\tutor? Hate paying exorbitant media fees?
            Is the waiting time too long? Tutor Plus got you covered. We made tuition
            hunting simple by connecting tutors and students, all in one platform.
          </p>
          <!--takes to signup form-->
          <a href="user-registration-form.php">
            <button type="button" class="btn btn-lg">
            <strong>Sign-up</strong>
          </button>
          </a>
          <a href="login-form.php">
            <button type="button" class="btn btn-lg">
            <strong>Login Page</strong>
            </button>
          </a>
          <!--toggles login modal-->
          <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#loginModal">
            <strong>login modal</strong>
          </button>
        </div>
        <!--Right section-->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <img class="cover-image " src="pic\cover-image.svg" alt="cover-image">
        </div>
      </div>
    </div>
    <!--login form-->
    <!--modal fade == modal that does not appear till toggle-->
    <div class="modal fade" id="loginModal">
      <!--creates a centered modal consisting of a dialog box-->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <button type="button" class="close" data-dismiss="modal"><span>??</span></button>
          </div>
          <div class="modal-body">
            <h4 class="modal-headline"><strong>Login Your Account</strong></h4>
            <div class="flex-column">
              <!--flex columns align items vertically-->
              <form class="login-form" method="post" name="login_form"  action="lib/login_process.php" onsubmit="return validated()">
                <!--form control is for visuals-->
                <input type="text" class="form-control" id="username-login" placeholder="Your email" name="email">
                <div class="error" id="uname_error">
                  *email can not be empty!
                </div>
                <input type="password" class="form-control" id="password-login" placeholder="Your password" name="password">
                <div class="error" id="password_error">
                  *Password can not be empty!
                </div>
                <!--toggles forgot password modal, data-dismiss closes the current modal-->
                <a class="close" data-dismiss="modal" data-toggle="modal" data-target="#sendModal">
                  <h6 class="forgot" type="submit">Forgot password?</h6>
                  <div class="error" id="no_uname">
                    *Please enter your username to reset password!
                  </div>
                </a>
                <button type="submit" class="btn btn-lg loginModal-btn" name="login">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--forgot form-->
    <div class="modal fade" id="sendModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <button type="button" class="close" data-dismiss="modal"><span>??</span></button>
          </div>
          <div class="modal-body">
            <h4 class="modal-headline"><strong>Enter your number</strong></h4>
            <div class="flex-column">
              <form class="send-form" method="post" name="send_form" onsubmit="return pnumValidated()">
                <input type="text" class="form-control pnum-box" id="send" placeholder="Enter Phone Number" name="p_num">
                <div class="error" id="pnum_error">
                  *Phone number can not be empty!
                </div>
                <button type="submit close" class="btn sendModal-btn" data-dismiss="modal" data-toggle="modal" data-target="#forgotModal">
                  Send OTP
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="forgotModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <button type="button" class="close" data-dismiss="modal"><span>??</span></button>
          </div>
          <div class="modal-body">
            <h4 class="modal-headline OTP-headline"><strong>Check your phone for OTP number</strong></h4>
            <div class="d-flex flex-column text-center">
              <form class="OTP-form" method="post" name="otp_form" onsubmit="return validate_reset()">

                <input type="text" class="form-control" id="otp" placeholder="Enter OTP Number" name="otp_num">
                <div class="error" id="otp_error">
                  *OTP can not be empty! Please check your phone again.
                </div>
                <input type="password" class="form-control" id="new-password-forgot" placeholder="New password" name="new_password">
                <div class="error" id="np_error">
                  *Please enter a new password!
                </div>
                <input type="password" class="form-control" id="confirm-password-forgot" placeholder="Confirm New password" name="confirm_password">
                <div class="error" id="cnp_error">
                  *Please confirm the new password!
                </div>
                <div class="error" id="npmatch_error">
                  *New Password and Confirmed New Password do not match!
                </div>
                <button type="submit" class="btn btn-lg forgotModal-btn">Confirm and Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/-->
  <hr>
  <!--why section-->
  <div class="upper-body2">
    <div class="why">
      <h2>Why Tutor Plus?</h2>
    </div>
    <!--container are used to create default grid system-->
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="reason">
            <div class="reason-icon">
              <img src="pic\free.svg" alt="free">
            </div>
            <h3 class="reason-headline">It's Free</h3>
            <p class="reason-content">Tutor plus is free to sign-up and use. (*conditions apply)</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="reason">
            <div class="reason-icon">
              <img src="pic\no-middleman.svg" alt="no middle man">
            </div>
            <h3 class="reason-headline">No Middle Man</h3>
            <p class="reason-content">We connect tutors and students directly to each other.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="reason">
            <div class="reason-icon">
              <img src="pic\no-waiting.svg" alt="no waiting">
            </div>
            <h3 class="reason-headline">No Waiting Time</h3>
            <p class="reason-content">Connect instantly at the touch of your fingertips.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/-->

  <div id="meet-hr">
    <hr>
  </div>

  <div class="middle-body">
    <div class="container">
      <div class="row row-meet-headline">
        <h3 class="meet-headline">Meet The Team</h3>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="team-item">
            <span class="socials d-inline-block">
              <a href="#" class="zmdi zmdi-github"></a>
              <a href="#" class="zmdi zmdi-linkedin"></a>
              <a href="#" class="zmdi zmdi-google"></a>
            </span>
            <span class="img-holder d-inline-block">
              <img src="pic\catface1.svg" alt="Team">
            </span>
            <div class="team-content">
              <h5>Alibne</h5>
              <p>NSU ECE</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="team-item">
            <span class="socials d-inline-block">
              <a href="#" class="zmdi zmdi-github"></a>
              <a href="#" class="zmdi zmdi-linkedin"></a>
              <a href="#" class="zmdi zmdi-google"></a>
            </span>
            <span class="img-holder d-inline-block">
              <img src="pic\catface2.svg" alt="Team">
            </span>
            <div class="team-content">
              <h5>Prince</h5>
              <p>NSU ECE</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="team-item">
            <span class="socials d-inline-block">
              <a href="#" class="zmdi zmdi-github"></a>
              <a href="#" class="zmdi zmdi-linkedin"></a>
              <a href="#" class="zmdi zmdi-google"></a>
            </span>
            <span class="img-holder d-inline-block">
              <img src="pic\catface3.svg" alt="Team">
            </span>
            <div class="team-content">
              <h5>Nadim</h5>
              <p>NSU ECE</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="lower-body">
    <p>All rights reserved ??</p>
  </div>

  <script src="js\main.js"></script>

</body>

</html>
