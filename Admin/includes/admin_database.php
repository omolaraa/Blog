<?php

  $conn = mysqli_connect('localhost', 'Tobi', 'Queenzy', 'cms');

  if($conn->connect_errno){
    exit('Connection Failed' . $conn->connect_error);
  }

?>