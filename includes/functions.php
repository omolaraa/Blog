<?php

include 'database.php';

 //Validate name
// function validateName(){
//     if(empty($_POST['name'])) {
//         $nameErr = 'Name is required';
//       }else{
//         $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
//       }
// };


///////Submit client information to the database from contact.php///////////////
function postClientInfo(){

global $conn;

$name = $email = $body = '';
 $nameErr = $emailErr = $bodyErr = '';

 //Form submit
 if(isset($_POST['submit'])){

  //Validate name
  if(empty($_POST['name'])) {
    $nameErr = 'Name is required';
  }else{
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
  }
 
  //Validate email
  if(empty($_POST['email'])) {
    $emailErr = 'Email is required';
  }else{
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }

  //Validate body
  if(empty($_POST['body'])) {
    $bodyErr = 'Feedback is required';
  }else{
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  //Send form values to Mysql database:
    if(empty($nameErr) && empty($emailErr) && empty($bodyErr)){
      //Add to database
      $sql = "INSERT INTO `client_info` (name, email, body) VALUES ('$name', '$email', '$body')";
      if(mysqli_query($conn, $sql)){
        //Success
        header('Location: contact.php');
      }else{
        //Error
        echo 'Error: ' . mysqli_error($conn);
      }
    }
 }
}
?>