<?php
  $con = new mysqli("localhost", "root", "ismail", "iwpda");
  if ($con->connect_error) { 
      die("Connection failed: " . $con->connect_error); 
  }
 // if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $role    = $_POST['role'];
    $sql="SELECT * FROM credentials WHERE email='$email';";
    $result = $con->query($sql);
    $data = $result->num_rows;
    if($data==0){
      $sql="INSERT INTO credentials(email,name,username,password,role) VALUES ('$email','$name','$username','$password','$role');";
      $query = $con->query($sql); // Insert query
      if($query){
        echo "You have Successfully Registered..";
      }else{
        echo "Error....!!";
      }
    }else{
      echo "This email is already registered, Please try another email...";
    }
  //}
?>