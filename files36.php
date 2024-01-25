<?php

$fptr = fopen('text.txt','r');
if(!$fptr){
    die("unable to open file");

}

// echo fgets($fptr);
// echo fgets($fptr); // read line by line 

/*
   READ A FILE LINE BY LINE 
while($a = fgets($fptr)){
  echo $a;
}

echo "<br/>end of the file over here" ;
*/

// read file character by character 
// while($a = fgetc($fptr)){
//     echo $a;
//     break;
// }

// write a program which reds the content of a file until . has been encountered
while($a = fgetc($fptr)){
    echo $a;
    if($a == "."){
        break;
    }
}

//              Note 
// pointer move next once an execution of previous operation 

fclose($fptr);
// Main apni file ko close karne ki jemmedari khud leta hu

$content = fread($fptr,filesize('text.txt'));
// echo "$content <br/>";






?>