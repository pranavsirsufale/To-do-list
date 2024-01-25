<?php
// include '_dbconnect.php'
require '_dbconnect.php';

$sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn,$sql);

// Find the number of records returned 
$num = mysqli_num_rows($result);
echo $num;
echo "records found in the DataBase<br/>";

while ($row = mysqli_fetch_assoc($result)){
    echo "<p>".$row['sno']."<p/><strong> title is <strong/><p>". $row['title']."<p/><strong> message is <strong/><p>".$row['description']."<p/>";
    echo "<br/>";
}




?>
<pre> different between require and include is include 
    execute rest of the code except included code and require
    vice versa require won't execute both of code</pre>