<!DOCTYPE html>
<?php

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tutor Plus Signup</title>

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
    <link rel="stylesheet" href="css/styles.css"><title></title>
    <link rel="stylesheet" href="css/signup-style.css">
  </head>

  <body>
    <div class="container register">
              <div class="row">
                  <div class="col-md-3 register-left tnc">
                      <h3>Welcome</h3>
                      <p>Please read our terms and conditions before signing up!</p>
                      <a href="terms&conditions.pdf" target="_blank"><strong>Terms & conditions</strong></a>
                  </div>
                  <div class="col-md-9 register-right">
                    <h2 class="header">Sign Up</h2>
                      <div class="tab-content" id="myTabContent">
                        <form class="" action="lib/register.php" method="post" id="registerform" onsubmit="return validRegistration()">
                          <div class="row register-form">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="First Name *" name="fname" id="fname" />
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Last Name *" name="lname" id="lname" />
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" placeholder="Password *" name="password" id="pw" />
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control"  placeholder="Confirm Password *" value="" id="cpw" />
                                  </div>
                                  <div class="form-group">
                                      <div class="maxl">
                                          <label class="radio inline">
                                              <input type="radio" name="gender" value="male" checked>
                                              <span> Male </span>
                                          </label>
                                          <label class="radio inline">
                                              <input type="radio" name="gender" value="female">
                                              <span>Female </span>
                                          </label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <input type="email" class="form-control" placeholder="Your Email *" name="email" id="mail"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" minlength="11" maxlength="11" class="form-control" placeholder="Your Phone *" name="pnum" id="pnum" />
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control" id="usertype-selection" name="usertype">
                                          <option value="1">I am a Tutor</option>
                                          <option value="2">I am a Student</option>
                                      </select>
                                  </div>
                                  <div class="form-group form-check">
                                    <input class="form-check-input" type="checkbox" value="checked" id="tnc">
                                    <label class="form-check-label" for="flexCheckDefault" id="tnc-text">
                                      I have read and agreed to the terms and conditions
                                    </label>
                                  </div>
                                  <button type="submit" class="btn btn-lg register-btn" name="register">
                                    Register
                                  </button>
                              </div>
                          </div>
                        </form>
                          </div>
                      </div>
                  </div>
            </div>
        <script src="js/signup.js"></script>
  </body>
</html>
