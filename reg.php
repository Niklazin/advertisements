<?php
    
?>

<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <?php
            $website_title = 'Registration';
            require 'blocks/head.php'; 
        ?>
    </head>
    <body>
        <?php require 'blocks/header.php'; ?>


        <main class="container mt-5">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <h4>registration form</h4>
                    <form action="ajax/reg.php" method="POST">
                        
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" class="form-control">
                        
                        <label for="phone">phone</label>
                        <input type="text" name="user_phone" id="user_phone" class="form-control">                        
                        
                        <label for="password">password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        
                        <div class="alert alert-danger" id="errorBlock"></div>
                        
                        <button type="button" name="reg_user" id="reg_user" class="btn btn-success mt-5">register</button>
                    </form>
                    
                    
                </div>
               
            </div>    
        </main>
        
        
        
        
        <script>
           $(document).ready(function(){
            $("#reg_user").click(function(){
                 
                var user_phone = $('#user_phone').val();
                var email = $('#email').val();
                var login = $('#login').val();
                var pass = $('#password').val();
                 
                $.ajax({
                    url: 'ajax/reg.php',
                    type: 'POST',
                    cache: false,
                    data: {'user_phone' : user_phone, 'email' : email, 'login' : login, 'password' : pass},
                    dataType: 'html',
                    success: function (data) {
                       if(data == 1){
                           $("#reg_user").text("ok")
                           $("#errorBlock").hide();
                       }else{
                           $("#errorBlock").show();
                           $("#errorBlock").text(data);
                       }
                    }
                });
            });
           });
           
       </script>
       
  
    </body>
</html>



