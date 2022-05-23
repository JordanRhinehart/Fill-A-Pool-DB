<?php //php for truck filling
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
    // $name = $_POST['name'];
    // $address = $_POST['address'];
    // $price = $_POST['price'];
    // $comments = $_POST['comments'];
    $location_id = $_POST['location_id'];
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
    if(!empty($location_id) && is_numeric($location_id))
    {


        //save to database
        $query = "DELETE FROM truck_fill_locations WHERE location_id = '$location_id';";
        
        mysqli_query($con, $query);

        echo "Truck Fill Location removed successfully!";
        
        header("refresh:5; Location: TruckFillingPage.php");
        echo 'Information placed successfully! ' ;
        echo 'You\'ll be redirected in about 5 secs. If not, click <a href="TruckFillingPage.php">here</a>.';
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
        echo "Please enter a valid Trucking Fill Location to find, add, or remove";

        header("refresh:5; Location: TruckFillingPage.php");
        echo 'You\'ll be redirected in about 5 secs. If not, click <a href="TruckFillingPage.php">here</a>.';
        die;
        exit;

  }

}



?> 




