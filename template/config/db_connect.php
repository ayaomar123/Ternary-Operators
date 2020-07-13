<?php
//connect to // Db
$conn = mysqli_connect('localhost', 'aya', 'test1234', 'aya_pizza');

//check connections
if(!$conn){
  echo 'connections error' . mysqli_connect_error();
}


 ?>
