<?php
  session_start();
  include_once('config.php');
  if($_SESSION['ROLE']!='customer'){
    echo "<script>window.location.href='dashcustomer.php'</script>";
    exit();
  }
  $oid=$_GET['oid'];
  $sql="SELECT `quantity`,`productid` FROM `order` where `orderid`=".$oid;
  $result2=$con->query($sql);
  $row=$result2->fetch_assoc();
  $quan=$row['quantity'];
  $pid=$row['productid'];
  $sql="DELETE FROM `order` where `orderid`=".$oid;
  $result=$con->query($sql);
  if($result){
    $sql2="UPDATE `products` SET `stock`=`stock`+".$quan." WHERE `pid`=".$pid;
    $result3=$con->query($sql2);
    if($result3){
      echo "<script>window.location.href='billing.php'</script>";
      exit();
    }
  }
  else{
    echo "<script>window.location.href='home.php'</script>";
  }
?>