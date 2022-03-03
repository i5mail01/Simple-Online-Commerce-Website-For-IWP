<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#register").click(function() {
                    var name1      = $("#name").val();
                    var email1     = $("#email").val();
                    var username1  = $("#username").val();
                    var password1  = $("#password").val();
                    var cpassword1 = $("#cpassword").val();
                    var role1      = $("#role").val();
                    if (name1 == '' || email1 == '' || password1 == '' || cpassword1 == '' || username1 == '' || role1 == '') {
                        alert("Please fill all fields...!!!!!!");
                    } else if ((password1.length) < 8) {
                        alert("Password should atleast 8 character in length...!!!!!!");
                    } else if (!(password1).match(cpassword1)) {
                        alert("Your passwords don't match. Try again?");
                    } else {
                        $.post('signup_script.php', {
                            name: name1,
                            email: email1,
                            username: username1,
                            password: password1,
                            role:role1
                        }, function(data) {
                            if (data == 'You have Successfully Registered..') {
                                //$("form")[0].reset();
                                $("#name").val()="";
                                $("#email").val()="";
                                $("#username").val()="";
                                $("#password").val()="";
                                $("#cpassword").val()="";
                                $("#role").val()="";
                            }
                            alert(data);
                        });
                    }
                });
            });
        </script>
        <style>
            @import url("https://fonts.googleapis.com/css?family=Montserrat:wght@400;700&display=swap");
            body{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Montserrat", sans-serif;
                color:#fff;
            }

            h1{
                font-weight:900;
            }

            .container{
                height:100vh;
                display:flex;
                justify-content: center;
                align-items: center;
                font-size:16px;
                flex-direction: column;
            }

            .box{
                width: 350px;
                height: 500px;
                font-size: 16px;
                padding: 40px 40px;
                background: #0F044C;
                box-shadow: 0px 4px 8px 0 rgba(0, 0, 0, 0.2),0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border-radius: 30px;
            }

            .user{
                margin: top 50px;
            }

            .fas{
                position: absolute;
            }

            input{
                width: 90%;
                margin-bottom: 20px;
                padding:0px 30px 15px;
                font-size: 16px;
                border:none;
                border-bottom: 1px solid #141E75;
                outline: none;
                background-color: #0F044C;
                color: #fff;
            }

            input:focus{
                border-bottom: 1px solid #EEEEEE;
            }

            .reset-password{
                color: #ff7f50;
                text-align: right;
                margin-top: 0px;
                font-size: 12px;
            }

            .login-btn{
                margin-top: 25px;
                display:flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .btn {
                display:black;
                width:80%;
                padding: 15px;
                background-color: #EEEEEE;
                color: #0F044C;
                border:none ;
                border-radius: 20px;
                font-size:20px;
                font-weight:600;
                opacity: 0.8;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .btn:hover{
                opacity:1;
            }

            .signup span{
                color:#7fb8e6;
            }
            .signup span:hover{
                color:#3793df;
            }
        </style>
        <link 
           rel="stylesheet"
           href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
           integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
           crossorigin="anonymous"/>
    </head>
    <body>
        
        <div class="container">
            <div class="box">
                <div class="user">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" id="username" placeholder="Enter your desired username"/>
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" id="name" placeholder="Enter your full name"/>
                    <i class="fa fa-envelope"></i>
                    <input type="text" name="email" id="email" placeholder="Enter your email"/>
                    <i class="fa fa-unlock-alt"></i>
                    <input type="password" name="password" id="password" placeholder="Enter your password"/>
                    <i class="fa fa-unlock-alt"></i>
                    <input type="password" name="password" id="cpassword" placeholder="Re Confirm your password"/>
                    <i class="fas fa-user-tag"></i>
                    <input type="text" name="role" id="role" placeholder="Enter Your Role"/>          
                </div>
                <div>
                    <button class="btn" id="register">Sign Up</button>
                    <p class="signup">Already have an account??<span><a href="home.php">LogIn</span></p>
                </div>
            </div>
        </div>
    </body>
</html>
