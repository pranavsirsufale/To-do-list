<?php
// start the session and get the data


/*
PHP Sessions: $_SESSION & Starting a Session in PHP | PHP Tutorial #39
Introduction
In our previous tutorials, we have learned cookies PHP. Now, in this tutorial, we will learn about sessions in PHP. So, let's fire up our favorite code editor and start coding.

Sessions:
A session is a way to store information to be used across different pages. Unlike a cookie, the information is not stored on the users computer. Now to start a session, we need to type session_start();. Now we will use the session superglobal, which is $_SESSION['username'];. We will create another file, and then we will type echo $_SESSION['username']; and open the file. We will see the username session. 

Now we will learn to destroy a session. We need to create another file that unsets all the variables and then destroys it. The Code will Look Like this:

<?php
// Start the session and get the data
session_start();
session_unset();
session_destroy();
echo "<br> You have been logged out";
?>
So This is how you start and destroy a session in PHP. For better understanding watch the complete video

 

Code as described/written in the video
<?php
// Start the session and get the data
session_start();
session_unset();
session_destroy();
echo "<br> You have been logged out";
?>
Code as described/written in the video
<?php
// Start the session and get the data
session_start();
if(isset($_SESSION['username'])){
    echo "Welcome ". $_SESSION['username'];
    echo "<br> Your favorite category is ". $_SESSION['favCat'];
    echo "<br>";
}
else{
    echo "Please login to continue";
}
?>
Code as described/written in the video
<?php
// What is a session?
// Used to manage information across difference pages

// Verify the user login info
session_start();
$_SESSION['username'] = "Harry";
$_SESSION['favCat'] = "Books";
echo "We have saved your session";
?>


*/
session_start();
if (isset($_SESSION["username"])) {
    echo "Welcome ".$_SESSION['username'];
    echo "<br> Your Favorite category is ".$_SESSION['favCat'];    
    echo "<br/>";
}else{
    echo "Plese login to continue";
}

?>