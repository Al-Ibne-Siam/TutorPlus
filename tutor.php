
<?php
  	session_start();
		if(!isset($_SESSION['email'])){
			header("Location: index.php");
		}
?>

<!DOCTYPE html>
<!--
Template Name: Educo
Version: 2.0.0
Author:
Website:
Purchase:
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Begin Head -->
<head>
<meta charset="utf-8" />
<title>Tutor's Dashboard</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description"  content="Educo"/>
<meta name="keywords" content="Educo, html template, Education template" />
<meta name="author"  content="Kamleshyadav"/>
<meta name="MobileOptimized" content="320" />



<!--srart theme style -->
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<!-- end theme style -->
<!-- favicon links -->
<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
</head>
<body style="background:#edf2f6;">
<!--Page main section start-->
<div id="educo_wrapper">

<!--instructor single start-->
<div class="ed_dashboard_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="ed_sidebar_wrapper">
					<div class="ed_profile_img">
					<img src="http://placehold.it/263X263" alt="Profile Image" class="img-responsive" />
					</div>
					<h3><?=$_SESSION['fname']?> <?=$_SESSION['lname']?></h3>
					<p><span>active :- </span> 20 Min ago</p>
					 <div class="ed_tabs_left">
						<ul class="nav nav-tabs">
              <?php
              include('lib/connection.php');
              $q = "select count(*) from student;";
              $nOfStudents = mysqli_fetch_array(mysqli_query($conn, $q));
              $q2  = "select count(*)
                      from user
                      where email = any (select distinct s.student_email
                      from student_shortlist s join tutor_shortlist t
                      on s.tutor_email = t.tutor_email
                      where s.student_email = t.student_email);";
              $nOfMatches = mysqli_fetch_array(mysqli_query($conn, $q2));
              ?>
						  <li class="active"><a href="#a" data-toggle="tab">profile</a></li>
						  <li><a href="#b" data-toggle="tab">students <span><?=$nOfStudents[0]?></span></a></li>
						  <li><a href="#c" data-toggle="tab">View Matches <span><?=$nOfMatches[0]?></span></a></li>
							<li><a href="lib/logout.php">logout</a></li>
              <li><a data-toggle="modal" data-target="#delete-confirm">Delete account</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="ed_dashboard_tab">
				<div class="tab-content">
					<div class="tab-pane active" id="a">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">Your Details</a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="view">
									<div class="ed_inner_dashboard_info">
										<h2> <?=$_SESSION['fname']?> <?=$_SESSION['lname']?> (Tutor)</h2>
										<table id="profile_view_settings">
											<thead>
												<tr>
													<th>Name</th>
													<th>Curriculum</th>
													<th>background</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><?=$_SESSION['fname']?> <?=$_SESSION['lname']?></td>
													<td><?=$_SESSION['curriculum']?></td>
													<td><?=$_SESSION['background']?></td>
												</tr>
											</tbody>
										</table>
									</div>
									</div>
								</div>



							</div><!--tab End-->
						</div>
						<div class="premium-box">
							<h3>Congratulations, you are a premium user!</h3>
						</div>
            <br>
            <br>
            <div class="ed_dashboard_inner_tab">
            <div class="myinfo">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h3 class="card-title">Update CV</h3>

                  <h6 class="card-subtitle mb-2 text-muted">Make sure the info you put are accurate.</h6>

                  <form class="form-group" action="lib/update.php" method="post">
                    <select class="custom-select custom-select-lg cselect" name="curriculum" required>
                      <option value="">Change your curriculum</option>
                      <option value="Bangla Medium">Bangla medium</option>
                      <option value="English Medium">English medium</option>
                    </select>
                    <br>
                      <select class="custom-select custom-select-lg bselect" name="background" required>
                        <option value="">Change your background</option>
                        <option value="Science">Science</option>
                        <option value="Commerce">Commerce</option>
                        <option value="Arts">Arts</option>
                      </select>
                      <br>
                      <br>
                      <br>
                      <label for="about me">About Me</label>
                      <textarea name="aboutme" cols="38" rows="5"><?=$_SESSION['about_me']?></textarea>
                      <br>
                      <br>
                      <button type="submit" class="btn btn-primary" name="CV_update">update</button>
                  </form>
                </div>
              </div>
            </div>
					</div>
        </div>
					<div class="tab-pane" id="b">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#my" aria-controls="my" role="tab" data-toggle="tab">courses</a></li>
								</ul>



								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="my">
										<div class="ed_inner_dashboard_info">
											<h2>Students</h2>
                      <div class="row">
                        <div class="ed_mostrecomeded_course_slider">
                      <?php
                        include('lib/connection.php');
                        $view_student = "select *
                                          from (select email, fname, lname, gender from user) u join student s
                                          on u.email = s.user_email
                                          order by rand();";
                        $run = mysqli_query($conn, $view_student);
                        while($row = mysqli_fetch_array($run)){
                          $studen_email = $row[0];
                          $fname = $row[1];
                          $lname = $row[2];
                          $gender = $row[3];
                          $institution = $row[5];
                          $background = $row[6];
                          $curriculum = $row[7];
                          $more_info = $row[8];
                          $min_fees = $row[9];
                          $max_fees = $row[10];
                          $location = $row[11];
                        ?>

    													<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_bottompadder20">
    														<div class="ed_item_img">
    															<img src="http://placehold.it/248X156" alt="item1" class="img-responsive">
    														</div>
    														<div class="ed_item_description ed_most_recomended_data">
    																<h4><a href="course_single.html"><?=$fname?> <?=$lname?></a></h4>
                                    <h5>Salary: ৳<?=$min_fees?>-৳<?=$max_fees?></h5>
                                    <h5>Area: <?=$location?> </h5>
                                    <h5>Institution: <?=$institution?></h5>
                                    <h5>Curriculum: <?=$curriculum?> </h5>
                                    <h5>Background:<?=$background?> </h5>
                                    <h5>Gender: <?=$gender?> </h5>
                                    <textarea disabled rows="5" cols="30"><?=$more_info?></textarea>
    																<a href="lib/slStudent.php?s_email=<?=$studen_email?>" class="ed_getinvolved">Interested<i class="fa fa-long-arrow-right"></i></a>
    														</div>
    													</div>
                          <?php
                        }
                       ?>
                       </div>
                       </div>
										</div>
									</div>
								</div>

							</div><!--tab End-->
						</div>
					</div>
					<div class="tab-pane" id="c">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Matches</a></li>
                  <li role="presentation"><a href="#instructing" aria-controls="instructing" role="tab" data-toggle="tab">conversations</a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="personal">
									<div class="ed_inner_dashboard_info">
										<div class="ed_course_single_info">
                      <?php
                        include('lib/connection.php');
                        $match = "select fname, lname, email, pnum
                                  from user
                                  where email = any (select distinct s.student_email
                                  from student_shortlist s join tutor_shortlist t
                                  on s.tutor_email = t.tutor_email
                                  where s.student_email = t.student_email);";
                        $matchExist = mysqli_query($conn, $match);
                        while($row = mysqli_fetch_array($matchExist)){
                          $fname = $row[0];
                          $lname = $row[1];
                          $email = $row[2];
                          $pnum = $row[3];
                          ?>

                          <div class="ed_add_students">
    												<h4>Congratulations! You have matched with <?=$fname?> <?=$lname?></h4>
    												<h6>Contact student ASAP!</h6>
                            <textarea disabled rows="2" cols="40">Phone:<?=$pnum?> email:<?=$email?></textarea>
    											</div>
                          <?php
                        }
                       ?>

											<div class="col-lg-12">
											<div class="row">
												<div class="ed_blog_bottom_pagination ed_toppadder40">
												<nav>
													<ul class="pagination">
														<li><a href="#">1</a></li>
														<li><a href="#">2</a></li>
														<li><a href="#">3</a></li>
														<li class="active"><a href="#">Next <span class="sr-only">(current)</span></a></li>
													</ul>
												</nav>
												</div>
											</div>
											</div>
										</div>
									</div>
									</div>
                  <div role="tabpanel" class="tab-pane" id="instructing">
										<div class="ed_inner_dashboard_info">
											<div class="convo-box">
												<h4>Aniket Prantor</h4>
												<p> >> Hello !</p>
												<p> << What is your speciality? </p>
												<form class="ed_tabpersonal">
													<div class="form-group">
													<textarea name="whats_new" class="form-control" id="whats_new" cols="50" rows="5"></textarea>
													</div>
													<div class="form-group">
													<button class="btn ed_btn ed_green">Send Message</button>
													</div>
												</form>

											</div>
										</div>
									</div>
								</div>


							</div><!--tab End-->
						</div>
					</div>
				</div>
			</div>
			</div>


		</div>
	</div>
</div>
<!--instructor single end-->

</div>
<div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Warning!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form class="delete-form" action="lib/deleteUser.php" method="post">
          <div class="modal-body">
            <h4>Are you sure you want to delete your account?
              <br>
              Doing so will delete all your existing records.
            </h4>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" name="user-delete">Confirm delete</button>
          </div>
        </form>
    </div>
  </div>
</div>
<!--Page main section end-->
<!--main js file start-->
<script type="text/javascript" src="js/jquery-1.12.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script type="text/javascript" src="js/jquery.stellar.js"></script>
<script type="text/javascript" src="js/smooth-scroll.js"></script>
<script type="text/javascript" src="js/plugins/revel/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="js/plugins/revel/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/plugins/revel/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/plugins/revel/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/plugins/revel/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/plugins/countto/jquery.countTo.js"></script>
<script type="text/javascript" src="js/plugins/countto/jquery.appear.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

<!--main js file end-->
</body>
</html>
