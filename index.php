<?php

$insert = false;
  // connection  to the database 

    $servername = "localhost";
    $username = "root";
    $password = "Pranav@123";
    $database = "notes";

    // create connection
    $conn = mysqli_connect($servername,$username,$password,$database);
   

    //Die if connection unsuccess
    // if(!$conn){
    //     die("Sorry we failed to connect". mysqli_connect_error());
    // }else{
       
        

    // number of records returnd
    // $num = mysqli_num_rows($result);
    // echo $num;
    // echo "records fround in the database";
    // }

    





?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function(){
      $('#myTable').DataTable();
    });

    </script>
 
   <title>Notes App !</title>
  </head>


<!-- Modal -->
<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Edit</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
<form action="/crud/index.php" method="POST" >
  <input type="hidden" name='snoEdit' id='snoEdit'>
  <div class="form-group ">
    <label for="exampleInputEmail1" for="note_title" class="form-label">Note Title</label>
    <input type="text" name='title_edit'  class="form-control" id="title_edit" aria-describedby="emailHelp">
  </div>
  <div class="form-group my-4">
    <label for="description" class="form-label">Note Description</label>
    <textarea name='description_edit' id="description_edit" class="form-control"></textarea>
</div>
  <button type="submit" class="btn btn-primary">Update note</button>
</form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->


  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        PHP_CRUD
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Contact us
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
       
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div style="height: 40px;" >
<?php
function myMessage($msgtitle,$message){

echo "<div style='background-color:#51e2f5;' class='alert container form-group alert-info alert-dismissible fade show' role='alert'>
<strong>$msgtitle</strong>$message
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";

  };



  if(isset($_GET['delete'])){

    $no = $_GET['delete'];
    $sql_del = "DELETE FROM `notes` WHERE `notes`.`sno` = $no";
    $result = mysqli_query($conn,$sql_del);
    $suc = " Successfully !";
    $mess = "Your message has deleted successfully ! ";
    // header(Location:'http://localhost/crud/index.php');
  
  echo "<script> 
      window.location.assign(`http://localhost/crud/index.php`)
      </script>";

    myMessage($suc,$mess);
  }

  if(!$conn){
    $e = "Error!";
    $err = " something error has occurt";
    myMessage($e,$err);
  }

  if($_SERVER['REQUEST_METHOD'] == "POST"){
   if(isset($_POST['note_title']) || isset($_POST['description'])){
    $title = $_POST['note_title'];
    $description = $_POST['description'];
    $sql_query = "INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, '$title', '$description', '2024-01-21 05:24:43.000000');";
    $resul = mysqli_query($conn,$sql_query);
    $insert = true;
   }

  

  if(isset($_POST['snoEdit'])){
      // update the record
      $snoEdit = $_POST['snoEdit'];
      $title_edit = $_POST['title_edit'];
      $descripttion_edit = $_POST['description_edit'];
      $sql = "UPDATE `notes` SET `title` = '$title_edit', `description` = '$descripttion_edit' WHERE `notes`.`sno` = '$snoEdit';";
      $result = mysqli_query($conn,$sql);
      $success = "Sussessfully !";
      $suc_message = " message has been updated successfully  ";
      myMessage($success,$suc_message);
  }else{
    if($insert){
      $success = "Sussessfully !";
      $suc_message = " message has been saved successfully  ";
      myMessage($success,$suc_message);
    }
  }

  if(isset($_POST['snodel'])){
    $snodel = $_POST['snodel'];
    echo "I am here";

  }



  


  }

?>

</div>

    
<div class="mt-4 container">
    <h2 class="text-center">Add a Note</h2>
<form action="/crud/index.php" method="POST" >
  <div class="form-group ">
    <label for="exampleInputEmail1" for="note_title" class="form-label">Note Title</label>
    <input type="text" name="note_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group my-4">
    <label for="description" class="form-label">Note Description</label>
    <textarea name="description" id="description" class="form-control"></textarea>
</div>
  <button type="submit" class="btn btn-primary">Add note</button>
</form>
</div>

<div class="container py-4">




<table class='table' id="myTable">
  <thead>
    <tr>
    <th scope='col'>Sr No</th>
    <th scope='col'>Title</th>
    <th scope='col'>Description</th>
    <th scope='col'>Actions</th>
    </tr>
  </thead>
  <tbody>

<?php

    $sql = "select * from `notes`;";
    $resutlt_two = mysqli_query($conn,$sql);
    $sn = 0;
  while($row = mysqli_fetch_assoc($resutlt_two)){
    $sn += 1;
  echo "<tr>
      <th scope='row'>" . $sn. "</th>
      <td>" . $row['title'] . "</td>
      <td>" . $row['description'] . "</td>
      <td> <button class='edit button btn btn-sm btn-primary' id=".$row['sno'].">Edit</button>

       <button class='delete button btn btn-sm btn-danger' id="."d".$row['sno']."  >Detlete</button></td>
    </tr>";

    
};
?>


</tbody>
</table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </script>
    <script>
    edits = document.getElementsByClassName('edit')
    Array.from(edits).forEach((element)=>{
      element.addEventListener('click',(e)=>{

        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName('td')[0].innerText;
        desc = tr.getElementsByTagName('td')[1].innerText;
        description_edit.value = desc 
        title_edit.value = title
        snoEdit.value = e.target.id
        $('#exampleModal').modal('toggle')

      })
    })

    deltes = document.getElementsByClassName('delete')
    Array.from(deltes).forEach((element)=>{
      element.addEventListener('click',(e)=>{
        sno = e.target.id.substr(1,)
        console.log(sno);
        if(confirm(" Are you sure to delte !")){
         window.location = `/crud/index.php?delete=${sno}`;
         // TODO create a form and use post request to submit a form
       
        }else{
          return
        }
       

      })
    })

 
  </script>
  </body>
</html>