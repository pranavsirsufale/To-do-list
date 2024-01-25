<?php
// connection to the database
$servername = "localhost";
$username = "root";
$password = "Pranav@123";
$database = "notes";

//Create a connection 
$conn = mysqli_connect($servername,$username,$password,$database);

// Die if connection fail
if(!$conn){
    die("Sorry we failed to connect: ".mysqli_connect_error());
}else{
    function myMessage($msgtitle,$message){

        echo "<div style='background-color:#51e2f5;' class='alert container form-group alert-info alert-dismissible fade show' role='alert'>
        <strong>$msgtitle</strong>$message
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        
          };

    $status = "Successfully !";
    $message = " Database connected successfully !";
    myMessage($status,$message);
}

?>