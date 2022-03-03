<?php
 session_start();
 if(!isset($_SESSION['ID'])){
     echo "<script>window.location.href='home.php'</script>";
     exit();
 }
 $role=$_SESSION['ROLE'];
 include_once('config.php');
 $sql="";
 if(isset($_POST['submit']) && isset($_POST['searchby'])){
     if($_POST['searchby']=='prodid'){
         $x=(int)$_POST['searchinput'];
         $sql="SELECT * FROM products WHERE pid=".$x.";";
     }else if($_POST['searchby']=='prodname'){
         $x=$_POST['searchinput'];
         $sql="SELECT * FROM products WHERE pname LIKE '%".$x."%';";
     }
     $result=$con->query($sql);
     $data=$result->num_rows;
 //} Add this bracket at the end
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Search Result</title>
        <script>
                var btn = document.getElementById('redirbtn');
                btn.addEventListener('click', function() {
                  document.location.href = '<?php if($_SESSION['ROLE']=="customer")
                                                     echo "dashcustomer.php";
                                                  else
                                                     echo "dashboard.php";
                                            ?>';
                });
        </script>
        <style>
            .t1{
            font-family:sans-serif;
            text-align: center;
            border-radius:5px;
        }
        
        th,td {
            border: 1px solid #666;
            border-collapse: collapse;
        }

        tr{
            font-size: 20px;
        }

        .btn{
            display: block;
            width: 100%;
            border: 1px solid black;
            border-radius: 5px;
            background-color: #cceb1c;
            color: rgb(14, 13, 13);
            padding: 0px;
            font-size: 15px;
            cursor: pointer;
            text-align: center;
        }

        #redirbtn{
            display: block;
            width: 100%;
            border: 2px solid black;
            border-radius: 5px;
            background-color: #cceb1c;
            color: rgb(14, 13, 13);
            padding: 0px;
            font-size: 15px;
            cursor: pointer;
            text-align: center; 
        }
        </style>
    </head>
    <body>
        <?php
          if($data==0){
              echo "<h1>The searched product was not found.</h1>";
              echo "<button id='redirbtn'>Click Me To Go Back</button>";
          }
          else if($data>0 && $role=='admin'){
            echo "
            <div>
            <h1 style='text-align: center;'>List Of Products Available</h1>
            <div class='ordertable'>
              <table style='border:4px solid black;margin-left:auto;margin-right:auto;' class='t1'>
                  <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Quantity In Stock</th>
                      <th>Product Price</th>
                      <th>********</th>
                      <th>********</th>
                  </tr>";
           while($row = $result->fetch_assoc()){
               echo "<tr>
                        <td>".$row['pid']."</td>
                        <td>".$row['pname']."</td>
                        <td>".$row['stock']."</td>
                        <td>".$row['price']."</td>
                        <td>
                           <a href='delete.php?pid=".$row['pid']."'>
                               <div class='btn'>
                                  <p>Delete</p>
                               </div>
                           </a>
                        </td>
                        <td>
                           <a href='update.php?pid=".$row['pid']."'>
                               <div class='btn'>
                                  <p>Update</p>
                               </div>
                           </a>
                        </td>
                      </tr>";
              }
              echo "</table></div>
                    <a href='dashboard.php'>
                    <div class='btn'>
                       <p>Click Me To Take Back To The Home Page</p>
                    </div></a></div>";
          }else if($data>0 && $role=='customer'){
            echo "
            <div>
            <h1 style='text-align: center;'>List Of Products Available</h1>
            <div class='ordertable'>
              <table style='border:4px solid black;margin-left:auto;margin-right:auto;' class='t1'>
                  <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Quantity In Stock</th>
                      <th>Product Price</th>
                      <th>********</th>
                  </tr>";
           while($row = $result->fetch_assoc()){
               echo "<tr>
                        <td>".$row['pid']."</td>
                        <td>".$row['pname']."</td>
                        <td>".$row['stock']."</td>
                        <td>".$row['price']."</td>
                        <td>
                           <a href='addquantity.php?pid=".$row['pid']."'>
                               <div class='btn'>
                                  <p>Order</p>
                               </div>
                           </a>
                        </td>
                      </tr>";
              }
              echo "</table></div>
                    <a href='dashcustomer.php'>
                    <div class='btn'>
                       <p>Click Me To Take Back To The Home Page</p>
                    </div></a></div>";
          }
        }//final bracket of line 10 condition
        ?>
    </body>
</html>