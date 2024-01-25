<?php
// Start the session and get the data
session_start();
echo "Weclcome ".$_SESSION['username'];
echo "<br> Your favorite category is" . $_SESSION['favCat'];    
echo "You have been logged out ";

session_unset();
session_destroy();

?>