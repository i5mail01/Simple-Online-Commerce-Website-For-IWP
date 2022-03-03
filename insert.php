<?php
 session_start();
 if(!isset($_SESSION['ID'])){
   echo "<script>window.location.href='home.php'</script>";
    exit();
  }
  include_once('config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Insert By Admin</title>
    </head>
    <body>
        
        <h1>Enter the product details below Admin Mr.<?php echo $_SESSION['NAME']; ?> to insert a product</h1>
        <div>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                    <label for="prodname">Product Name:</label>
                    <input type="text" name="pname" id="pname" placeholder="<?php echo $pname;?>"/><br>
                    <label for="stock"> In Stock :</label>
                    <input type="number" name="pstock" id="pstock" placeholder="<?php echo $stock;?>"/><br>
                    <label for="price">Price Of The Product</label>
                    <input type="number" step="any" name="pprice" id="pprice" placeholder="<?php echo $pprice;?>"/><br>
                    <input type="submit" name="submit" value="Insert Product">
            </form>
        </div>
    </body>
</html>

<?php
  if(isset($_POST['submit'])){
      $pname=$_POST['pname'];
      $pstock=$_POST['pstock'];
      $pprice=$_POST['pprice'];
      //$sql2="UPDATE products set pname='".$productname."',stock=".$productstock.",price=".$productprice." WHERE pid=".$pid.";";
      $sql="INSERT INTO products(pname,stock,price) VALUE('".$pname."',".$pstock.",".$pprice.");";
      $result2 = $con->query($sql);
      if($result2){
        echo "<script>window.location.href='dashboard.php'</script>";
      }
      else{
        echo "<script>window.location.href='home.php'</script>";
      }
  }
?>