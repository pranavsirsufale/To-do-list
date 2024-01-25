<?php

echo "write files in php";
// $fptr = fopen("myfiles1.txt",'w');
// // it shall not throw an error even if the file already exists! fwrite()
// fwrite($fptr,"Plesae dont argue with me on this one. this is the best !"); 
// echo " the operation has been executed successfully ! ";

// fclose($fptr);


// Appending to a file in php
$fptr = fopen("myfile2.txt","a");
fwrite($fptr,"This is being appnded to the file \n");
fclose($fptr);


?>