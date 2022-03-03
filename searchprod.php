<?php
  session_start();
  if(!isset($_SESSION['ID'])){
    echo "<script>window.location.href='home.php'</script>";
  }
  include_once('config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Searching For A Product</title>
    </head>
    <body>
        <h1>
            Welcome to search product page <?php echo $_SESSION['ROLE']." Mr.".$_SESSION['NAME'] ?>
        </h1>
        <div>
            <h2>Input Your search details below :</h2>
            <form action="searchprodres.php" method="POST">
                Search By :    
                <input type="radio" name="searchby" value="prodid">Product ID
                <input type="radio" name="searchby" value="prodname">Product Name
                <br><br>
                Enter details: <input type="text" name="searchinput">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
    </body>
</html>