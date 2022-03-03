<?php
   session_start();
   if(!isset($_SESSION['ID']) || ($_SESSION['ROLE']!='customer')){
       echo "<script>window.location.href='home.php'</script>";
       exit();
   }
   if(isset($_POST['submit'])){
       
       //if($file_type = $_FILES['attachfile']['type']=="text/plain")
           $file_name = $_FILES['attachfile']['name'];
           $temp_name = $_FILES['attachfile']['tmp_name'];
           $data=$temp_name;
           $to=$_POST['recievermail'];
           $sub=$_POST['mailsubject'];
           $msg=$_POST['message'];
           $data1 = chunk_split(base64_encode(file_get_contents($data)));
           $uid = md5(uniqid(time()));
           $headers= "From: don't reply\r\n";
           $headers.= "Reply-To: seyedismail.mohamed2019@vitstudent.ac.in\r\n";
           $headers.= "MIME-Version: 1.0\r\n";
           $headers.="Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n";
           $headers.="This is a multi-part message in MIME format.\r\n";
           $headers.= "--".$uid."\r\n";
           $headers.= "Content-Type: ".$file_type."; name=\"".$file_name."\"\r\n";
           $headers.= "Content-Transfer-Encoding: base64\r\n";
           $headers.= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n";
           $headers.= $data1."\r\n";
           if(mail($to,$sub,$msg,$headers)){
               echo "<h1 style='text-align:center;'>Your mail has been sent successfully</h1>";
               echo "<button href='http://localhost/dashboard/iwpda/dashcustomer.php'>Click me to go to ur dashboard</button>";
           }else{
            echo "<h1 style='text-align:center;'>Your mail has failed to send</h1>";
            echo "<button href='http://localhost/dashboard/iwpda/dashcustomer.php'>Click me to go to ur dashboard</button>";
           }
        
   }
?>
