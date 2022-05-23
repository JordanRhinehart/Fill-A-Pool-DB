<?php //php for appointments
// include_once ('connection.php');
// include_once ('functions.php');
// if(isset($_POST['submit']))
// {    
//     $first_name_1 = $_POST['first_name_1'];
//     $last_name_1 = $_POST['last_name_1'];
//     $address = $_POST['address'];
//     $gallons = $_POST['gallons'];
//     $type_of_pool = $_POST['type_of_pool'];
//     $comments = $_POST['comments'];
//      if(!empty($first_name_1) && !empty($last_name_1) && !is_numeric($first_name_1) && !is_numeric($last_name_1) && !empty($address))
//      {
//      $sql = "insert into customers (first_name, last_name, address, pool_type, gallons_in_pool, comments) 
//      VALUES ('$first_name_1', '$last_name_1', '$address', '$type_of_pool', '$gallons', '$comments')";
//      if (mysqli_query($con, $sql)) {
//         echo "New record has been added successfully !";
//      } else {
//         echo "Error: " . $sql . ":-" . mysqli_error($con);
//      }
//      mysqli_close($conn);
//     }
// }

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // something was posted
    // $first_name = $_POST['first_name'];
    // $last_name = $_POST['last_name'];
    $first_name_1 = $_POST['first_name_1'];
    $last_name_1 = $_POST['last_name_1'];
    $address = $_POST['address'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $gallons = $_POST['gallons'];
    $type_of_pool = $_POST['type_of_pool'];
    $comments = $_POST['comments'];
    // $first_name_remove = $_POST['first_name_remove'];
    // $last_name_remove = $_POST['last_name_remove'];
    // $customer_id = $_POST['customer_id'];
    

//if variables are not empty or invalid AND if the proper button was pressed
    // if(!empty($first_name) && !empty($last_name) && !is_numeric($first_name) && !is_numeric($last_name))
    // {

    //     //save to database
    //     $query = "SELECT * FROM customers WHERE first_name = '$first_name' AND last_name = '$last_name'";

    //     mysqli_query($con, $query);


    // } else
    if(!empty($first_name_1) && !empty($last_name_1) && !is_numeric($first_name_1) && !is_numeric($last_name_1) && !empty($address) 
    && !empty($date) && !empty($time))
    {


        //save to database
        $query = "insert into upcoming_jobs (first_name, last_name, date, time, address, pool_type, number_of_gallons, comments) 
        VALUES ('$first_name_1', '$last_name_1', '$date', '$time', '$address', '$type_of_pool', '$gallons', '$comments')";
        
        mysqli_query($con, $query);

        echo "Information placed successfully!";
        
        header("refresh:5; Location: AppointmentsPage.php");
        echo 'Information placed successfully! ' ;
        echo 'You\'ll be redirected in about 5 secs. If not, click <a href="AppointmentsPage.php">here</a>.';
        exit;
        die;

    }
    // else if(!empty($first_name_remove) && !empty($last_name_remove) && !is_numeric($first_name_remove) && !is_numeric($last_name_remove))
    // {

    //     //save to database
    //     $query = "DELETE FROM customers WHERE first_name = '$first_name_remove' AND last_name = '$last_name_remove'";

    //     mysqli_query($con, $query);
        
    // }    
    // else if(!empty($customer_id) && is_numeric($customer_id))
    // {

    //     //save to database
    //     $query = "DELETE FROM customers WHERE id = '$customer_id'";

    //     mysqli_query($con, $query);
        
    // }    
    else
    {
        echo "Please enter a valid Appointment Date to find, add, or remove";

        header("refresh:5; Location: AppointmentsPage.php");
        echo 'You\'ll be redirected in about 5 secs. If not, click <a href="AppointmentsPage.php">here</a>.';
        die;
        exit;

  }

}





?> 




