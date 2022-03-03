<?php
   $hostname = "localhost"; 
   $username = "root"; 
   $password = "ismail"; 
   $dbname   = "iwpda";
   $con = new mysqli("localhost", "root", "ismail", "iwpda");
   if ($con->connect_error) { 
       die("Connection failed: " . $con->connect_error); 
   }
?>