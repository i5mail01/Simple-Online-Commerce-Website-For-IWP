<?php
  session_start();
  if(isset($_SESSION['ID']) && ($_SESSION['ROLE']=='admin')) {
    echo "<script>window.location.href='dashboard.php'</script>";
    exit();
  }
  if(isset($_SESSION['ID']) && ($_SESSION['ROLE']=='customer')) {
    echo "<script>window.location.href='dashcustomer.php'</script>";
    exit();
  }
  $con = new mysqli("localhost", "root", "ismail", "iwpda");
  if ($con->connect_error) { 
      die("Connection failed: " . $con->connect_error); 
  }
  if (isset($_POST['submit'])) {
      $errorMsg = "";
      $username = $_POST['username'];
      $password = $_POST['password'];
      if (!empty($username) || !empty($password)) {
        $sql  = "SELECT * FROM credentials WHERE username = '".$username."' AND password = '".$password."';";
        $result = $con->query($sql);
        $data=$result->num_rows;
        if($data==1){
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row['id'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['NAME'] = $row['name'];
            $_SESSION['USERNAME'] = $row['username'];
            if($row['role']=='admin'){
              echo "<script>window.location.href='dashboard.php'</script>";
              exit;
            }else if($_SESSION['ROLE']=="customer"){
              echo "<script>window.location.href='dashcustomer.php'</script>";
              exit;
            }                            
         }else{
          $errorMsg = "No user found on this username";
        }
      }else{
        $errorMsg = "Username and Password is required";
      }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Seyed Ismail Mohamed Salih::19BCE2509</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#open").click(function() {
          $(".overlay").show();
        });
        $(".closebtn").click(function() {
          $(".overlay").hide();
        });
      });
    </script>
    <style>
      .overlay {
        height: 100%;
        width: 100%;
        display: none;
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        overflow-y: hidden;
      }

      .overlay-content {
        position: relative;
        margin: 0 auto;
        top: 5%;
        height: 70%;
        overflow: auto;
        width: 50%;
        background-color: white;
        text-align: center;
        margin-top: 30px;
        padding-top: 5em;
      }

      .overlay-content form label {
        float: left;
        margin-left: 1em;
        margin-top: 10px;
        margin-bottom: .1em;
        font-size: 1.5em;
      }

      .overlay-content form input {
        margin-top: 30px;
        margin-bottom: 10px;
        width: 80%;
        position: relative;
        padding: 1em;
        text-align: center;
      }

      .overlay-content form button {
        padding: 1em;
        background-color: black;
        color: white;
        cursor: pointer;
      }

      .overlay a {
        padding: 8px;
        text-decoration: none;
        font-size: 1em;
        color: blue;
        display: block;
        transition: 0.3s;
      }

      .overlay a:hover {
        text-decoration: underline;
      }

      .overlay .closebtn {
        position: absolute;
        margin: 0 auto;
        top: 0px;
        right: 1px;
        width: auto;
        padding: .2em;
      }

      .overlay p:hover {
        background-color: red;
      }

      @media screen and (max-height: 450px) {
        .overlay {
          overflow-y: auto;
        }

        .overlay a {
          font-size: 20px
        }

        .overlay .closebtn {
          font-size: 40px;
          top: 15px;
          right: 35px;
        }

        .button-login {
          align-items: center;
          background-color: #0A66C2;
          border: 0;
          border-radius: 100px;
          box-sizing: border-box;
          color: #ffffff;
          cursor: pointer;
          display: inline-flex;
          font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;
          font-size: 16px;
          font-weight: 600;
          justify-content: center;
          line-height: 20px;
          max-width: 480px;
          min-height: 40px;
          min-width: 0px;
          overflow: hidden;
          padding: 0px;
          padding-left: 20px;
          padding-right: 20px;
          text-align: center;
          touch-action: manipulation;
          transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
          user-select: none;
          -webkit-user-select: none;
          vertical-align: middle;
        }

        .button-login:hover,.button-login:focus {
          background-color: #16437E;
          color: #ffffff;
        }

        .button-login:active {
          background: #09223b;
          color: rgb(255, 255, 255, .7);
        }

        .button-login:disabled {
          cursor: not-allowed;
          background: rgba(0, 0, 0, .08);
          color: rgba(0, 0, 0, .3);
        }
      }

      .signup {
          text-align: center;
          border-style: dotted;
          border-width: 2px;
          border-radius: 5px;
          background-color: #800044;
      }

      .signup.visited{
        box-shadow: 0 3px 10px 2px #444;
      }

      .signup:hover{
          background-color:grey;
      }

      img {
          display: block;
          margin-left: auto;
          margin-right: auto;
        }
      .yyy {
          text-align: center;
          border-style: dotted;
          border-width: 2px;
          border-radius: 5px;
          background-color: #918bd6;
      }
    </style>
  </head>
  <body>
    <div class="overlay">
      <div class="overlay-content">
        <h2>Please Enter Your Credentials</h2>
        <p class="closebtn" style="font-size:30px;cursor:pointer"> &times;</p>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
          <label>Username :</label>
          <input type="text" placeholder="TYPE you Username" name="username">
          <br>
          <label>Password :</label>
          <input type="password" placeholder="Type your password" name="password">
          <br>
          <input type="submit" name="submit" class="button-login" value="Login">
        </form>
        <br>
        <div class="signup">
            <p>Click Me To SignUp</p>
            <a href="signup.php"></a>
        </div>    
      </div>
    </div>
    <div class="yyy">
    <h1 style="text-align:center;">Welcome to Theory DA Home page</h1>
    <h2 style="text-align:center;">Seyed Ismail 19BCE2509</h2>
    <br>
    <br>
    <img src="https://cdn.freelogovectors.net/wp-content/uploads/2021/02/vitlogo.png" width="300" height="300">
    <p id="open" style="font-size:30px;text-align:center;cursor:pointer">Hello!! Click Me To Login Or Signup</p>
    </div>
</body>
</html>