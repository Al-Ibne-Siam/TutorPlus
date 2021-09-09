<!doctype html>
<?php require_once("lib/connection.php"); ?>
<html class="no-js" lang="">

<head>

  <meta charset="utf-8">
  <title>Tutor+ Login</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;800&display=swap" rel="stylesheet">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">

  <!-- Bootstrap CDN -->

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js:6" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body class="intro-body">

  <!-- Add your site or application content here -->

<div class="container" style="margin-top: 5%;">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div style="font-size:40px;" class="intro-title">
        Welcome!
      </div>
      <h5 style="font-size:28px; text-align:center;">Login As A Tutor Or Student</h5>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="login-box">
          <div class="lb-header">
            <a href="#" class="active" id="login-box-link">Login</a>
          </div>

          <form class="email-login" action="lib/login_process.php" method="POST">

            <?php
if(isset($_GET['loginerror'])) {
	$loginerror=$_GET['loginerror'];
}
 if(!empty($loginerror)){  echo '<p class="errmsg">Invalid login credentials, Please Try Again..</p>'; } ?>

            <div class="u-form-group">
              <input name="login_var" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" type="email" placeholder="Email"/>
            </div>
            <div class="u-form-group">
              <input type="password" name="password" placeholder="Password"/>
            </div>
            <div class="u-form-group">
              <button type="submit" name="sublogin">Log in</button>
            </div>
          </form>


        </div>
    </div>
  </div>
</div>





  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
