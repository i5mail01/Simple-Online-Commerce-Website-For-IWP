<?php
 session_start();
   include_once('config.php');
   if(!isset($_SESSION['ID'])){
    echo "<script>window.location.href='home.php'</script>";
    exit();
   }
   $pid=$_GET['pid'];
   $sql="SELECT * FROM products where pid=".$pid.";";
   $result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update By Admin</title>
    </head>
    <body>
        <?php 
         if($result->num_rows==0){
            echo "<script>window.location.href='dashboard.php'</script>";
           } 
           $row = $result->fetch_assoc();
           $pname=$row['pname'];
           $pstock=$row['stock'];
           $pprice=$row['price'];
        ?>
        <h1>Update the product details below Admin Mr.<?php echo $_SESSION['NAME']; ?></h1>
        <div>
            <form action="updating.php" method="POST">
                    <label for="produid">Product ID:</label>
                    <input type="text" name="prodid" id="prodid" value="<?php echo $pid;?>"/><br>
                    <label for="produname">Product Name:</label>
                    <input type="text" name="pname" id="pname" value="<?php echo $pname;?>"/><br>
                    <label for="ustock"> In Stock :</label>
                    <input type="number" name="pstock" id="pstock" value="<?php echo $pstock;?>"/><br>
                    <label for="uprice">Price Of The Product</label>
                    <input type="number" step="any" name="pprice" id="pprice" value="<?php echo $pprice;?>"/><br>
                    <input type="submit" name="submit" value="Update">
            </form>
        </div>
    </body>
</html>

