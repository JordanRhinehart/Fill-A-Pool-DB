<?php


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "fill_a_pool";


if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("Failure to connect ");

}

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);