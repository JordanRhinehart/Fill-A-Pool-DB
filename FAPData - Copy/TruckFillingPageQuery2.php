<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$address = $_POST['address'];



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
  window.location.href="ShowAllFillingLocationsQueryPage.php"; 
}

$(document).ready(function() {
  window.location.hash = "#Class1";
})
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
                    <li><a href="index.php">Home</a></li>
                    <li class=""><a href="CustomersPage.php">Customers</a></li>
                    <li class=""><a href="AppointmentsPage.php">Appointments</a></li>
                    <li class="active"><a href="TruckFillingPage.php">Truck Refilling</a></li>
                    <li style="opacity:0;" class="">Search</li>
                    <li style="color: white; background-color:azure;" class=""><a href="logout.php">Logout</a></li>
                      </ul>
              </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
      </nav><!-- end nav -->
    </div><!-- end container -->
</div>
</header><!-- end header -->
<br><br>

      <!-- <section class="section customer-homepage.transheader parallax" data-stellar-background-ratio="0.3">
        <div class="container">
          <div class="row">
            <div class="text-center"><br>
              <h2 style="color:rgb(0, 0, 0)";>Truck Refilling</h2>
              </form>
            </div><!-- end col -->
          <!-- </div>end row -->
        <!-- </div>end container -->
       <!-- </section>end section -->
       <!-- <br><br> -->

      <section>
			<div class="container">
        <div class="row">
          <div class="container-fluid">
            <div class="row text-center col-md-6">
              <div>
                <div class="home-service c1">
                  <i class="flaticon-competition"></i>
                  <p><strong>REFILL LOCATIONS</strong></p>
                </div><!-- end home-service -->
              </div><!-- end col -->

              <div>
              <!------------------------------------------------------->
              <!-- Upcoming appointments Table -->
              <!------------------------------------------------------->
              <!------------------------------------------------------->
              <div> 
                <div class="table-form c1">
                    <table border="1" cellspacing="5" cellpadding="5" width="100%">
                        <thead>
                            <tr>
                                <th>location_id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Price per gallon</th>
                                <th>Comments</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once('connection.php');
                            $result = mysqli_query($conn,"SELECT * FROM truck_fill_locations ORDER BY location_id ASC");
                            for($i=0; $row = mysqli_fetch_array($result); $i++){
                        ?>
                            <tr>
                                <td><label><?php echo $row['location_id'] /* ?? 'Null'*/; ?></label></td>
                                <td><label><?php echo $row['name'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['address'] ?? 'Null'; ?></label></td>
                                <td><label><?php echo $row['price_per_gallon'] ?? 'Null'; ?></label></td>
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
              </div><!-- end col -->

              
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!------------------------FIND APPOINTMENTS FORM---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
              <br><br><br><br><br><br>
              <form id="Class1" class="formy" action="TruckFillingPageQuery.php" method="POST">
              <div class="home-service2">
                  <i class="flaticon-competition"></i>
                  <p><strong>FIND FILL LOCATIONS</strong></p>
                </div><!-- end home-service -->

              <div>
              <div class="table-form c1">
                    <table border="1" cellspacing="5" cellpadding="5" width="100%">
                        <thead>
                            <tr>
                                <th>location_id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Price per gallon</th>
                                <th>Comments</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once('connection.php');
                            $result = mysqli_query($conn,"SELECT * FROM truck_fill_locations WHERE address = '$address' ORDER BY location_id ASC");
                            for($i=0; $row = mysqli_fetch_array($result); $i++){
                        ?>
                            <tr>
                                <td><label><?php echo $row['location_id'] /* ?? 'Null'*/; ?></label></td>
                                <td><label><?php echo $row['name']; ?></label></td>
                                <td><label><?php echo $row['address']; ?></label></td>
                                <td><label><?php echo $row['price_per_gallon'] ; ?></label></td>
                                <td><label><?php echo $row['comments'] ; ?></label></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- end home-service -->         
              </div><!-- end col -->
              <br>

              <div class="texty" style="float: left; width: 100%;"> <!-- First name text box -->
                <p style="float: left;"><strong>Location Name:</strong></p>
                <input id="text" type="text" name="name" style="width: 40%; float: left; margin-top: 15px;">
              </div>     
                <!--  End First name text box -->

              <br><br><br><br>
              <!--Beginning of Buttons div-->
              <div class="index-button-3 texty"> 
                <button id="find-cuss-button-1" type="submit" onclick="$name = $_POST['name']">SUBMIT</button>
              </div>
                <<div class="index-button-4 texty">
                  <button id="find-cuss-button-2" type="reset">CLEAR</button>
                </div><!-- end of button 2 div -->
                <div class="index-button-5 texty">
                    <button id="find-cuss-button-3" type="button" onclick="myFunction()">SHOW ALL</button>
                  </div><!-- end of button 2 div -->

        </form>

        <form class="formy" action="TruckFillingPageQuery2.php" method="POST">
              <h3><strong>O R</strong></h3>

              <!-- Date text box -->
              <div class="texty" style="float: left; width: 100%;"> 
                <p style="float: left;"><strong>Address:</strong></p>
                <input id="text" type="text" name="address" style="width: 40%; float: left; margin-top: 15px;">
              </div> <!-- End Date text box -->
              <br><br><br><br>
                <!--Beginning of Buttons div-->
                <div class="index-button-3 texty"> 
                    <button id="find-cuss-button-1" type="submit" onclick="$address = $_POST['address']">SUBMIT</button>
                  </div>
                  <div class="index-button-4 texty">
                  <button id="find-cuss-button-2" type="reset">CLEAR</button>
                </div><!-- end of button 2 div -->
                    <div class="index-button-5 texty">
                    <button id="find-cuss-button-3" type="button" onclick="myFunction()">SHOW ALL</button>
                  </div><!-- end of button 2 div -->
                    
        </form>
                            
        <form class="formy" action="TruckFillingPageQuery3.php" method="POST">
              
              <h3><strong>O R</strong></h3>
              <!-- Date text box -->
              <div class="texty" style="float: left; width: 100%;"> 
                <p style="float: left;"><strong>Price:</strong></p>
                <input id="range" type="number" name="price2" style="width: 10%; float: left; margin-top: 15px;">
              </div> <!-- End Date text box -->



                <br><br><br>
                <!--Beginning of Buttons div-->
                <div class="index-button-3 texty"> 
                  <button id="find-cuss-button-1" type="submit" onclick="$price = $_POST['price2']">SUBMIT</button>
                </div>
                <div class="index-button-4 texty">
                  <button id="find-cuss-button-2" type="reset">CLEAR</button>
                </div><!-- end of button 2 div -->
                  <div class="index-button-5 texty">
                    <button id="find-cuss-button-3" type="button" onclick="myFunction()">SHOW ALL</button>
                  </div><!-- end of button 2 div -->

        </form>
                
                <br><br><br><br>

                
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-----------------------------------ADD LOCATIONS FORM--------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->


          <form class="formy" action="insert3.php" method="POST">
          <div class="home-service2">
                  <i class="flaticon-competition"></i>
                  <p><strong>ADD FILL LOCATION</strong></p>
                </div><!-- end home-service -->
    
                  <!-- First name text box -->
                  <div class="texty" style="float: left; width: 100%;"> 
                    <p style="float: left;"><strong>Name:</strong></p>
                    <input id="text" type="text" name="name" style="width: 40%; float: left; margin-top: 15px;">
                  </div>         
                   <!--  End First name text box -->
                   

                   <!-- Last name text box -->
                  <div class="texty" style="float: left; width: 100%;"> 
                    <p style="float: left;"><strong>Address:</strong></p>
                    <input id="text" type="text" name="address" style="width: 40%; float: left; margin-top: 15px;">
                  </div> 
                  <!-- EndLast name text box -->


                  <!-- Address name text box -->
                  <div class="texty" style="float: left; width: 100%;"> 
                    <p style="float: left;"><strong>Price:</strong></p>
                    <input id="text" type="number" name="price" style="width: 10%; float: left; margin-top: 15px;">
                  </div> 
                  <!-- End Address name text box -->

                  <br><br><br><br><br>



                  <!-- Comments text box -->
                  <div class="texty" style="float: left; width: 100%; height: 30px;"> 
                    <p style="float: left;"><strong>Comments:</strong></p>
                    <textarea id="text" type="text" name="comments" style="width: 40%; float: left; margin-top: 15px;height: 50px;"></textarea>
                  </div> <!-- End Comments text box -->
                    <br><br><br><br><br><br><br>


                    <!--Beginning of Buttons div-->
                    <div class="index-button-3 texty"> 
                      <button id="find-cuss-button-1" type="submit">SUBMIT</button>
                    </div>
                    <div class="index-button-4 texty">
                  <button id="find-cuss-button-2" type="reset">CLEAR</button>
                </div><!-- end of button 2 div -->
                      <!-- end of buttons div -->
          </form>


                  <br><br><br><br>


<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!----------------------------------REMOVE APPOINTMENTS FORM---------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->


          <form class="formy" action="remove3.php" method="POST">

              <div class="home-service3">
                  <i class="flaticon-competition"></i>
                  <p><strong>REMOVE LOCATION</strong></p>
                </div><!-- end home-service -->

              <div class="texty" style="float: left; width: 100%; margin-top: 30px;"> <!-- First name text box -->
                <p style="float: left;"><strong>LOCATION ID</strong></p>
                <input id="text" type="text" name="location_id" style="width: 40%; float: left; margin-top: 15px;">
              </div>         
            

                <br><br><br><br>

                <div class="index-button-3 texty"> <!--Beginning of Buttons div-->
                  <button id="find-cuss-button-1" type="submit">SUBMIT</button>
                </div>
                  <div class="index-button-4 texty">
                  <button id="find-cuss-button-2" type="reset">CLEAR</button>
                </div><!-- end of button 2 div -->

          </form>
                
                <!-- <br><br><br><br> -->


                <!-- <h3><strong>O R</strong></h3> -->
                
                <!-- <br>
                <div style="float: left; width: 100%;"> First name text box -->
                  <!-- <p style="float: left;"><strong>Customer ID:</strong></p> -->
                  <!-- <input id="text" type="text" name="user_name" style="width: 40%; float: left; margin-top: 15px;"> -->
                <!-- </div>          -->
                
                   <!-- End First name text box --> 
  
                  <!-- <br><br><br><br><br><br>
  
                  <div class="index-button-3"> Beginning of Buttons div-->
                    <!-- <button id="find-cuss-button-1" type="button" onclick="alert('Hello world!')">Click Me!</button> -->
                  <!-- </div> -->
                    <!-- <div class="index-button-4"> -->
                      <!-- <button id="find-cuss-button-2" type="button" onclick="alert('Hello world!')">Click Me!</button> -->
                    <!-- </div>end of button 2 div -->
                  
                  <!-- <br><br><br><br> -->


                



<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->


            </div><!-- end row -->
          </div><!-- end container -->
				<div class="section-title text-center">

          </div>
            <br><br>

        </section>

<footer>Jordan Rhinehart &copy; 2021
</footer>
</div>
    </div>
        </div>
            </div>
</body>
</html>
