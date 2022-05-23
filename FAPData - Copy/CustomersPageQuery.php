<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

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
     window.location.href="ShowAllCustomersQueryPage.php"; 
} 



$(document).ready(function() {
  window.location.hash = "#Class1";
  // $(document).scrollTop(900);
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
                    <li class="active"><a href="CustomersPage.php">Customers</a></li>
                    <li class=""><a href="AppointmentsPage.php">Appointments</a></li>
                    <li class=""><a href="TruckFillingPage.php">Truck Refilling</a></li>
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
              <h2 style="color:rgb(0, 0, 0)";>Customers</h2>
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
                  <p><strong>CUSTOMERS</strong></p>
                </div><!-- end home-service -->
              </div><!-- end col -->



              <!------------------------------------------------------->
              <!-- Customers Table -->
              <!------------------------------------------------------->
              <!------------------------------------------------------->
              <div> 
                <div class="table-form c1">
                    <table border="1" cellspacing="5" cellpadding="5" width="100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Pool Type</th>
                                <th>Gallons in Pool</th>
                                <th>Comments</th>
                                <th>Last Service Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once('connection.php');
                            $result = mysqli_query($conn,"SELECT * FROM customers ORDER BY id ASC LIMIT 10");
                            for($i=0; $row = mysqli_fetch_array($result); $i++){
                        ?>
                            <tr>
                                <td><label><?php echo $row['id'] /* ?? 'Null'*/; ?></label></td>
                                <td><label><?php echo $row['first_name']; ?></label></td>
                                <td><label><?php echo $row['last_name'] ; ?></label></td>
                                <td><label><?php echo $row['address'] ; ?></label></td>
                                <td><label><?php echo $row['pool_type'] ; ?></label></td>
                                <td><label><?php echo $row['gallons_in_pool'] ; ?></label></td>
                                <td><label><?php echo $row['comments'] ; ?></label></td>
                                <td><label><?php echo $row['last_service_date'] ; ?></label></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- end home-service -->
              </div><!-- end col -->
              <!-- End Customers Table -->
              <!------------------------------------------------------->
              <!------------------------------------------------------->

              
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!------------------------FIND CUSTOMERS FORM------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
              <br><br><br><br><br><br><br>
              <form class="formy" id="Class1" action="CustomersPageQuery.php" method="POST">
              <div class="home-service2">
                  <i class="flaticon-competition"></i>
                  <p><strong>FIND CUSTOMER</strong></p>
                </div><!-- end home-service -->

              <div>
              <div class="table-form c1">
                    <table border="1" cellspacing="5" cellpadding="5" width="100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Pool Type</th>
                                <th>Gallons in Pool</th>
                                <th>Comments</th>
                                <th>Last Service Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                           
                            require_once('connection.php');
                            // $first_name = $_GET['first_name'];
                            // $last_name = $_GET['last_name'];
                            $firstlastnamequery = mysqli_query($conn,"SELECT * FROM customers WHERE 
                            first_name = '$first_name' AND last_name = '$last_name' ORDER BY id ASC");
                            for($i=0; $row = mysqli_fetch_array($firstlastnamequery); $i++){
                        ?>
                            <tr>
                                <td><label><?php echo $row['id'] /* ?? 'Null'*/; ?></label></td>
                                <td><label><?php echo $row['first_name']; ?></label></td>
                                <td><label><?php echo $row['last_name'] ; ?></label></td>
                                <td><label><?php echo $row['address'] ; ?></label></td>
                                <td><label><?php echo $row['pool_type'] ; ?></label></td>
                                <td><label><?php echo $row['gallons_in_pool'] ; ?></label></td>
                                <td><label><?php echo $row['comments'] ; ?></label></td>
                                <td><label><?php echo $row['last_service_date'] ; ?></label></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- end home-service -->     
              </div><!-- end col -->
              <br>



          <!------------------------------------------------------------------------------------------->
          <!------------------------------------------------------------------------------------------->
          <!------------------------------------------------------------------------------------------->
          <!------------------------------------------------------------------------------------------->
          <!------------------------------------------------------------------------------------------->

      
              <!-- First name text box -->
              <div class="texty" style="float: left; width: 100%;"> 
                <p style="float: left;"><strong>First Name:</strong></p>
                <input id="text" type="text" name="first_name" style="width: 40%; float: left; margin-top: 15px;">
              </div>         
              <!--  End First name text box -->


              <!-- Last name text box -->
              <div class="texty" style="float: left; width: 100%;">
                <p style="float: left;"><strong>Last Name:</strong></p>
                <input id="text" type="text" name="last_name" style="width: 40%; float: left; margin-top: 15px;">
              </div> 
              <!-- EndLast name text box -->

                <br><br><br><br><br><br>

                <div class="index-button-3 texty"> <!--Beginning of Buttons div-->
                  <button id="find-cuss-button-1" type="submit" onclick="$first_name = $_POST['first_name']; $last_name = $_POST['last_name'];">SUBMIT</button>
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
<!-----------------------------------ADD CUSTOMERS FORM--------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->


            <form class="formy" action ="insert.php" method="POST">

            <div class="home-service2">
                  <i class="flaticon-competition"></i>
                  <p><strong>ADD CUSTOMER</strong></p>
                </div><!-- end home-service -->

                <br>
                <!-- First name text box -->
                <div class="texty" style="float: left; width: 100%;"> 
                  <p style="float: left;"><strong>First Name:</strong></p>
                  <input id="text" type="text" name="first_name_1" style="width: 40%; float: left; margin-top: 15px;">
                </div>         
                <!--  End First name text box -->
            

                <!-- Last name text box -->
                <div class="texty" style="float: left; width: 100%;"> 
                  <p style="float: left;"><strong>Last Name:</strong></p>
                  <input id="text" type="text" name="last_name_1" style="width: 40%; float: left; margin-top: 15px;">
                </div> 
                <!-- EndLast name text box -->


                <!-- Address name text box -->
                <div class="texty" style="float: left; width: 100%;"> 
                  <p style="float: left;"><strong>Address:</strong></p>
                  <input id="text" type="text" name="address" style="width: 40%; float: left; margin-top: 15px;">
                </div> 
                <!-- End Address name text box -->  


                <!-- Gallons Needed text box -->
                <div class="texty" style="float: left; width: 100%;"> 
                  <p style="float: left;"><strong>Gallons Needed:</strong></p>
                  <input id="text" type="number" name="gallons" style="width: 10%; float: left; margin-top: 15px;">
                </div> 
                <!-- End Gallons Needed  name text box -->


                <!-- Pool type Dropdown box -->
                <div class="texty" style="float: left; width: 100%;"> 
                  <!-- <p style="float: left;"><strong>Last Name:</strong></p> -->
                  <!-- <input id="text" type="password" name="password" style="width: 40%; float: left; margin-top: 15px;"> -->
                  <label for="cars" style="width: 20%; float: left; margin-top: 15px;"><strong style="float: left;"> Type of Pool:</strong></label>
                  <select name="type_of_pool" id="cars" style="width: 30%; margin-top: 20px; float: left; margin-right: 35px;">
                    <option value="Below">Below</option>
                    <option value="Above">Above</option>
                  </select>
                </div> 
                <!-- End Pool type Dropdown box -->



                <!-- Comments text box -->
                <div class="texty" style="float: left; width: 100%; height: 30px;"> 
                  <p style="float: left;"><strong>Comments:</strong></p>
                  <textarea id="text" type="text" name="comments" style="width: 40%; float: left; margin-top: 15px;height: 50px;"></textarea>
                </div> <!-- End Comments text box -->
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>


                <!--Beginning of Buttons div-->
                <div class="index-button-3 texty" class="texty"> 
                  <button id="find-cuss-button-1" type="submit">SUBMIT</button>
                </div>
                <div class="index-button-4 texty">
                  <button id="find-cuss-button-2" type="reset">CLEAR</button>
                </div><!-- end of button 2 div -->

            </form>



                  <br><br><br><br>
                  

<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!----------------------------------REMOVE CUSTOMERS FORM------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------->


        <!-- <form class="formy" action="cusremove2.php" method="POST">

        <div class="home-service3">
                  <i class="flaticon-competition"></i>
                  <p><strong>REMOVE CUSTOMER</strong></p>
                </div><!-- end home-service -->

              <!-- <div class="texty" style="float: left; width: 100%;"> First name text box -->
                <!-- <p style="float: left;"><strong>First Name:</strong></p> -->
                <!-- <input id="text" type="text" name="first_name_remove" style="width: 40%; float: left; margin-top: 15px;"> -->
              <!-- </div>          -->
              
                <!--  End First name text box -->
              <!-- <div class="texty" style="float: left; width: 100%;"> Last name text box -->
                <!-- <p style="float: left;"><strong>Last Name:</strong></p> -->
                <!-- <input id="text" type="text" name="last_name_remove" style="width: 40%; float: left; margin-top: 15px;"> -->
              <!-- </div> EndLast name text box -->

                <!-- <br><br><br><br><br><br> -->

                <!-- <div class="index-button-3 texty"> Beginning of Buttons div -->
                  <!-- <button id="find-cuss-button-1" type="submit">SUBMIT</button> -->
                <!-- </div> -->
                  <!-- <div class="index-button-4 texty"> -->
                    <!-- <button id="find-cuss-button-2" type="button" onclick="alert('Hello world!')">Click Me!</button> -->
                  <!-- </div>end of button 2 div -->

            <!-- </form> -->
                          

            <form class="formy" action="remove.php" method="POST">
            <div class="home-service3">
                  <i class="flaticon-competition"></i>
                  <p><strong>REMOVE CUSTOMER</strong></p>
                </div><!-- end home-service -->
                <div class="texty" style="float: left; width: 100%; margin-top: 30px;"> <!-- First name text box -->
                  <p style="float: left;"><strong>Customer ID:</strong></p>
                  <input id="text" type="number" name="customer_id" style="width: 40%; float: left; margin-top: 15px;">
                </div>         
                
                  <!--  End First name text box -->
  
                  <br><br><br><br><br><br>
  
                  <div class="index-button-3 texty"> <!--Beginning of Buttons div-->
                    <button id="find-cuss-button-1" type="submit">SUBMIT</button>
                  </div>

                  <div class="index-button-4 texty">
                  <button id="find-cuss-button-2" type="reset">CLEAR</button>
                </div><!-- end of button 2 div -->

            
        </form>
                  
                  <br><br><br><br>


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
