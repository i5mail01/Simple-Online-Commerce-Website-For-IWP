<?php
session_start();
include_once('config.php');
if(!isset($_SESSION['ID'])){
  echo "<script>window.location.href='home.php'</script>";
 exit();
}
$cid=$_SESSION['ID'];
$sql="SELECT * FROM `order` where `customerid`=".$cid;
$result = $con->query($sql);
$data = $result->num_rows;
//if($data==1){
  //  $row = $result->fetch_assoc();
//
//}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bill Generation</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        nav * {
            box-sizing: border-box;
        }

        body {
            margin: 0px;
            font-family: 'segoe ui';
        }

        .nav {
            height: 50px;
            width: 100%;
            background-color: #4d4d4d;
            border-radius: 5px;
            
        }

        div.nav{
            position: sticky;
            top:5px;
        }
        .nav>.nav-header {
            display: inline;
        }

        .nav>.nav-header>.nav-title {
            display: inline-block;
            font-size: 22px;
            color: #fff;
            padding: 10px 10px 10px 10px;
        }

        .nav>.nav-btn {
            display: none;
        }

        .nav>.nav-links {
            display: inline;
            float: right;
            font-size: 18px;
        }

        .nav>.nav-links>a {
            display: inline-block;
            padding: 13px 10px 13px 10px;
            text-decoration: none;
            color: #efefef;
        }

        .nav>.nav-links>a:hover {
            background-color: rgba(0, 0, 0, 0.3);
        }

        .nav>#nav-check {
            display: none;
        }

        @media (max-width:600px) {
            .nav>.nav-btn {
                display: inline-block;
                position: absolute;
                right: 0px;
                top: 0px;
            }

            .nav>.nav-btn>label {
                display: inline-block;
                width: 50px;
                height: 50px;
                padding: 13px;
            }

            .nav>.nav-btn>label:hover,.nav #nav-check:checked~.nav-btn>label {
                background-color: rgba(0, 0, 0, 0.3);
            }

            .nav>.nav-btn>label>span {
                display: block;
                width: 25px;
                height: 10px;
                border-top: 2px solid #eee;
            }

            .nav>.nav-links {
                position: absolute;
                display: block;
                width: 100%;
                background-color: #333;
                height: 0px;
                transition: all 0.3s ease-in;
                overflow-y: hidden;
                top: 50px;
                left: 0px;
            }

            .nav>.nav-links>a {
                display: block;
                width: 100%;
            }

            .nav>#nav-check:not(:checked)~.nav-links {
                height: 0px;
            }

            .nav>#nav-check:checked~.nav-links {
                height: calc(100vh - 50px);
                overflow-y: auto;
            }
        }

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
    </style>
</head>

<body>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                Hello Customer <?= $_SESSION['NAME'] ?>
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <div class="nav-links">
            <a href="logout.php" >LogOut</a>
        </div>
    </div>
    <h1>Bill Generation For Customer <?= $_SESSION['NAME'] ?></h1>
    <div>
        <?php
        if($data>0){
            $final=0;
           echo "<h1 style='text-align: center;'>List Of Products On Ordered:</h1>
        <div class='ordertable'>
            <table style='border:4px solid black;margin-left:auto;margin-right:auto;' class='t1'>
                <tr>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>Product Price</th>
                    <th>Product Name</th>
                    <th>Quantity Ordered</th>
                    <th>Amount</th>
                    <th>*********</th>
                </tr>";
                while($row = $result->fetch_assoc()){
                    $oid=$row['orderid'];
                    $final+=$row['total'];
                echo "<tr>
                    <td>".$row['orderid']."</td>
                    <td>".$row['productid']."</td>
                    <td>".$row['productprice']."</td>
                    <td>".$row['productname']."</td>
                    <td>".$row['quantity']."</td>
                    <td>".$row['total']."</td>
                    <td>
                        <a href='deleteorder.php?oid=".$oid."'>
                            <div class='btn'>
                                <p>Remove Order</p>
                            </div>
                        </a>
                    </td>
                </tr>";
            }
            echo "</table></div>";
            echo "<div><h2>Your final bill amount is : INR".$final."</h2></div>";
        }else{
            echo "<div><h2>You have no orders!!!!</h2></div>";
        }
        ?>
    </div>

</body>

</html>