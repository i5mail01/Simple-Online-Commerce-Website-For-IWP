<?php
 session_start();
   include_once('config.php');
   if(!isset($_SESSION['ID'])){
    echo "<script>window.location.href='home.php'</script>";
    exit();
   }
   $pid=$_GET['pid'];
   $sql="DELETE FROM products where pid=".$pid.";";
   $result = $con->query($sql);
   if($result){
     $sql="SELECT * FROM order WHERE `productid`=".$pid;
     $result = $con->query($sql);
     if($result->num_rows>0){
       while($row=$result->fetch_assoc()){
         $oid=$row['orderid'];
         $sql2="DELETE FROM `order` WHERE `orderid`=".$oid;
         $result2 = $con->query($sql2);
         if($result2){
          echo "<script>window.location.href='dashboard.php'</script>";
         }
       }
     }
    echo "<script>window.location.href='dashboard.php'</script>";
   }else{
    echo "<script>window.location.href='home.php'</script>";
   }
?>
