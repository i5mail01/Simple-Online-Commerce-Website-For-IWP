<?php
  session_start();
  if(!isset($_SESSION['ID'])){
    echo "<script>window.location.href='home.php'</script>";
  }
  include_once('config.php');
  if(isset($_POST['submit'])){
      $productname=$_POST['pname'];
      $pid=(int)$_POST['prodid'];
      $productstock=$_POST['pstock'];
      $productprice=$_POST['pprice'];
      $sql="UPDATE products set pname='".$productname."',stock=".$productstock.",price=".$productprice." WHERE pid=".$pid.";";
      $result = $con->query($sql);
      if($result){
        echo "<script>window.location.href='dashboard.php'</script>";
      }
      else{
        echo "<script>window.location.href='home.php'</script>";
      }
  }
?>