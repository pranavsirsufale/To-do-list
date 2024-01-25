<?php

$fptr = fopen('text.txt',"r");
// echo $fptr;


if(!$fptr){
    die("unable to open this file. Please enter a valid filename");
}

// first argument is file pointer and second is length
$size = filesize('text.txt');     // file size including white-spaces 
echo "file size is $size <br/>" ;
$content = fread($fptr,filesize("text.txt"));
echo $content;
fclose($fptr);



/*

Supported Protocols and Wrappers
fclose() - Closes an open file pointer
fgets() - Gets line from file pointer
fread() - Binary-safe file read
fwrite() - Binary-safe file write
fsockopen() - Open Internet or Unix domain socket connection
file() - Reads entire file into an array
file_exists() - Checks whether a file or directory exists
is_readable() - Tells whether a file exists and is readable
stream_set_timeout() - Set timeout period on a stream
popen() - Opens process file pointer
stream_context_create() - Creates a stream context
umask() - Changes the current umask
SplFileObject

*/
?>