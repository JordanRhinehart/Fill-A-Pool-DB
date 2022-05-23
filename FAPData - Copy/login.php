<?php

session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {

        //read from database
        $query = "SELECT * FROM users WHERE name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if($result){ 

            if($result && mysqli_num_rows($result) > 0) //If the session value exists, check that it is real. If so, return the user's data.
            {

                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] == $password)
                {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    
                    header("Location: index.php");
                    die;

                }

            }

        }echo "Please enter a valid username/password";

    }else
    {
        echo "Please enter a valid username/password";

    }

}

?>

<!DOCTYPE html>

<html>
<head>
    <title>Login</title>
</head>
<body>

    <style type="text/css">

        #text{

            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 80%;
        }

        #button{

            padding: 10x;
            width: 100px;
            color: white;
            background-color: lightblue;
            background-image: linear-gradient(blue, white);
            border: none;

        }

        #box{
            
            background-image: linear-gradient(grey, teal);
            margin: auto;
            width: 300px;
            padding: 20px;
        }

    </style> 
    <div id ="box">
        <form method ="post">
            
            <div style="font-size: 20px;margin: 10px;color: white;">Login</div>
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>


            <input id="button" type="submit" value="Login"><br><br>
            <a href="signup.php">Click to Signup</a><br><br>

        </form> 

    </div>
    <h1></h1>
</body>
</html>