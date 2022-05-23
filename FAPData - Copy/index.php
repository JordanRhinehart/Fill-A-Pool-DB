<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Fill-A-Pool</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="HomePage.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

</head>
<script>
  function myFunction() {
  window.location.href="AppointmentsPage.php#Class2"; 
} 
function myFunction2() {
  window.location.href="AppointmentsPage.php#Class3"; 
} 

//$(document).ready(function() {
//alert("Thank You For Visiting Our Website! Please complete the survey on our contact page. Thank you!");
//})
</script>
<body>

    <br>
    <h3 style="text-align: center; background-color: yellow;">Logged in as '<?php echo $user_data['name']; ?>'</h3>

<div id="wrapper">
  <header class="header site-header header-transparent">
    <div class="container">
      <nav class="navbar navbar-default">
          <div class="container-fluid">
              <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="CustomersPage.php">Customers</a></li>
                    <li class=""><a href="AppointmentsPage.php">Appointments</a></li>
                    <li class=""><a href="TruckFillingPage.php">Truck Refilling</a></li>
                    <li style="opacity:0;" class="">Search</a></li>
                    <li style="color: white; background-color:azure;" class=""><a href="logout.php">Logout</a></li>
                      </ul>
              </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
      </nav><!-- end nav -->
    </div><!-- end container -->
</div>
</header><!-- end header -->

      <section class="section transheader homepage parallax" data-stellar-background-ratio="0.3" style="background-image:url('background.jpg');">
        <div class="container">
          <div class="row">
            <div class="text-center"><br>
              <h2 style="color:rgb(0, 0, 0)";>Fill-A-Pool</h2>
              </form>
            </div><!-- end col -->
          </div><!-- end row -->
        </div><!-- end container -->
      </section><!-- end section -->

      <section>
			<div class="container">
        <div class="row">
          <div class="container-fluid">
            <div class="row text-center col-md-6">
              <div>
                <div class="home-service c1">
                  <i class="flaticon-competition"></i>
                  <p><strong>UPCOMING      APPOINTMENTS</strong></p>
                </div><!-- end home-service -->
              </div><!-- end col -->


              <!------------------------------------------------------->
              <!-- Upcoming appointments Table -->
              <!------------------------------------------------------->
              <!------------------------------------------------------->
              <div> 
                <div class="table-form c1">
                    <table border="1" cellspacing="5" cellpadding="5" width="100%">
                        <thead>
                            <tr>
                                <th>job_id</th>
                                <th>customer_id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>date</th>
                                <th>time</th>
                                <th>Address</th>
                                <th>Pool Type</th>
                                <th>Number of Gallons</th>
                                <th>Price</th>
                                <th>Comments</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once('connection.php');
                            $result = mysqli_query($conn,"SELECT * FROM upcoming_jobs ORDER BY job_id ASC LIMIT 5");
                            for($i=0; $row = mysqli_fetch_array($result); $i++){
                        ?>
                            <tr>
                                <td><label><?php echo $row['job_id'] /* ?? 'Null'*/; ?></label></td>
                                <td><label><?php echo $row['customer_id'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['first_name'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['last_name'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['date'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['time'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['address'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['pool_type'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['number_of_gallons'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['price'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['comments'] ?? 'Null'; ?></label></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- end home-service -->
              </div><!-- end col -->
              <!-- End Upcoming appointments Table -->
              <!------------------------------------------------------->
              <!------------------------------------------------------->
              
              <br><br><br><br><br><br><br>

              <div>
                <div class="home-service c1">
                  <i class="flaticon-domain"></i>
                  <p><strong>RECENTLY     COMPLETED     JOBS</strong></p>
                </div><!-- end home-service -->
              </div><!-- end col -->

              <div>
              <!------------------------------------------------------->
              <!-- Completed appointments Table -->
              <!------------------------------------------------------->
              <!------------------------------------------------------->
              <div> 
                <div class="table-form c1">
                    <table border="1" cellspacing="5" cellpadding="5" width="100%">
                        <thead>
                            <tr>
                                <th>job_id</th>
                                <th>customer_id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>date</th>
                                <th>time</th>
                                <th>Address</th>
                                <th>Type of Job</th>
                                <th>Pool Type</th>
                                <th>Number of Gallons</th>
                                <th>Price</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once('connection.php');
                            $result = mysqli_query($conn,"SELECT * FROM competed_jobs ORDER BY job_id ASC LIMIT 5");
                            for($i=0; $row = mysqli_fetch_array($result); $i++){
                        ?>
                            <tr>
                                <td><label><?php echo $row['job_id'] /* ?? 'Null'*/; ?></label></td>
                                <td><label><?php echo $row['customer_id'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['first_name'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['last_name'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['date'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['time'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['address'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['type_of_job'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['pool_type'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['number_of_gallons'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['price'] ?? 'Null'; ?></label></td>                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- end home-service -->
              </div><!-- end col -->
              <!-- End Completed appointments Table -->
              <!------------------------------------------------------->
              <!------------------------------------------------------->

                <br><br><br><br><br><br><br>
                <div class="index-button-1"> <!--Beginning of Buttons div-->
                  <button id="button-1" type="button" onclick="myFunction()">SCHEDULE JOB</button>
                </div>
                  <div class="index-button-2">
                    <button id="button-2" type="button" onclick="myFunction2()">CANCEL JOB</button>
                  </div><!-- end of button 2 div -->         
              </div><!-- end col -->
            </div><!-- end row -->
          </div><!-- end container -->
				<div class="section-title text-center">
          <div class="col-md-4 col-sm-4">
          </div>
          </div>
          <!-- <div class="col-md-6 text-center">
          <br><br> -->
					<!-- <h3 style="color:red";>The Purpose of COPPA Today</h3>
					<p class="lead"> Congress and the FTC have taken special steps to assure that children under 13 years of age don’t share their personal information on the Internet without the express approval of their parents. Congress passed the Children’s Online Privacy Protection Act in 1998 and the FTC wrote a rule implementing the law, which was revised in 2012. The FTC has taken law enforcement actions against companies that failed to comply with the provisions of the law.</p>
                <br>
                <video class="text-center" width="620" height="440" controls>
                  <source src="CoppaVideo.mp4" type="video/mp4">
                  <source src="CoppaVideo.ogg" type="video/ogg">
                Your browser does not support the video tag.
              </video><br><br><br> -->

                <!-- <br>
								<h4 style="color:green">Hold old is COPPA?</h4>
								<p class="lead">COPPA Law was passed in 1998 by the United States 15th Congress</p><br>
								<h4 style="color:purple">COPPA in today's age</h4>
								<p class="lead">The COPPA Law was repassed and redefined in the year 2000 with the internet growing more popular.</p>
					           <br>

								<h4 style="color:blue;">Title 15 of the United States Code</h4>
								<p class="lead">The Children's Online Privacy Protection Act is a United States federal law, located at 15 U.S.C. §§ 6501–6506.</p><br><br><br><br>
							</div> -->
						<!-- </div>end service-wrapper -->
            <br><br><br><br>
            
    </div>
    <!-- <div class="home-service c1 text-center">
      <a href="https://www.ftc.gov/tips-advice/business-center/guidance/childrens-online-privacy-protection-rule-six-step-compliance" target="blank" style="font-style:bold; font-size:2em"><strong>COPPA      OFFICAL     WEBSITE</strong></a> -->

    </div><!-- end home-service -->
    

        </section>

<footer>Jordan Rhinehart &copy; 2021
</footer>
</div>
    </div>
        </div>
            </div>
</body>
</html>
