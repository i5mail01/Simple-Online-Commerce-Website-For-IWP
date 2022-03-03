<?php
   session_start();
   if(!isset($_SESSION['ID']) || ($_SESSION['ROLE']!='customer')){
       echo "<script>window.location.href='home.php'</script>";
       exit();
   }
   include_once('config.php');
   $cid=$_SESSION['ID'];
   $sql="SELECT * FROM `credentials` WHERE `id` =".$cid;
   $result = $con->query($sql);
   $row = $result->fetch_assoc();
   $email = $row['email'];
   $name = $row['name'];
?>
<!DOCTYPE html>
<html>
<body>
<div>
 <form method="POST" action="sending.php" enctype="multipart/form-data">
  <p>Your Name : <input typ="text" name="sendername" value=<?= $name ?>></p>
  <p>Your Email : <input typ="text" name="sendermail" value=<?= $email ?>></p>
  <p>Recipient Email : <input typ="text" name="recievermail"></p>
  <p>Email Subject : <input typ="text" name="mailsubject"></p>
  <p>Write Message : <textarea id="text" name="message"></textarea></p>
  <p>Select An Attachment : <input type="file" name="attachfile"></p>
  <p><input type="submit" name="send_mail" value="Submit Feedback"></p>
 </form>
</div>
</body>
</html>