<?php
   session_start();
   include_once('config.php');
   $pid=$_SESSION['PID'];
   $customerid=$_SESSION['ID'];
   $sql="SELECT * FROM products where pid=".$pid.";";
   $result = $con->query($sql);
   //$data = $result->num_rows;
   $row=$result->fetch_assoc();
   $productprice=$row['price'];
   $productname=$row['pname'];
   $productstock=$row['stock'];
   if(isset($_POST['submit'])){
    $total=(float)($productprice*$_POST['quantity']);
    $quan=(int)($_POST['quantity']);
    $sql2="INSERT INTO `order` (`customerid`,`productid`,`productprice`,`productname`,`quantity`,`total`) VALUES('$customerid','$pid','$productprice','$productname','$quan','$total')";
    $result2 = $con->query($sql2);
    if($result2)
    {
     $sql3="UPDATE `products` SET `stock`=`stock`-'$quan' WHERE `pid`='$pid';";
     $result3 = $con->query($sql3);
     if($result3) {
         unset($_SESSION['PID']);
         echo "<script>window.location.href='dashcustomer.php'</script>";
         exit();
     }
     echo "<script>window.location.href='home.php'</script>";
     exit();
    }
    else{
     echo "<script>window.location.href='home.php'</script>";
     exit();
    }
  }
?>