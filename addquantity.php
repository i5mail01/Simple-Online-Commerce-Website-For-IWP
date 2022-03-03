<?php
   session_start();
   include_once('config.php');
   if(!isset($_SESSION['ID'])){
    echo "<script>window.location.href='home.php'</script>";
    exit();
   }
   if($_SESSION['ROLE']!='customer'){
    echo "<script>window.location.href='home.php'</script>";
       exit();
   }
   $pid=(int)$_GET['pid'];
   $customerid=$_SESSION['ID'];
   $sql="SELECT * FROM products where pid=".$pid.";";
   $result = $con->query($sql);
   //$data = $result->num_rows;
   $row=$result->fetch_assoc();
   $productprice=$row['price'];
   $productname=$row['pname'];
   $productstock=$row['stock'];
   $_SESSION['PID']=$pid;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add quantity page for the selected product</title>
    </head>
    <body>
        <h1>Are You Excited For Your Product Mr.<?php echo $_SESSION['NAME']; ?>??,So Are We!!</h1>
        <h1 style="text-align:center">Add The Required Quantity but not greater than <?= $productstock ?></h1>
        <form action="adding.php" method="POST">
            <label for="uquantity">Enter any number between 0- and <?= $productstock?>):</label>
            <input type="number" id="quantity" name="quantity">
            <h3>Clicking On Submitting will place order AT INR <?= $productprice ?> for each piece</h3>
            <input type="submit" name="submit" id="submit" value="Place The Order">
        </form>
    </body>
</html>
