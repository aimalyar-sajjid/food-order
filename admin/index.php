<?php 
    session_start();
    include("../config/config.php");
    
    if(isset($_SESSION['user_id']))
    {
        header("Location: {$URL}/admin/dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "common/links.php" ?>
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="row login-row">
            <div class="col-6">
                <div class="card p-3">
                    <h2 class="text-center">Admin Login</h2>
                    <form action="" class="row" id="login-form">
                        <div class="form-groupmt-3  col-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control validate" name="email" id="email">
                            <small></small>
                        </div>

                        <div class="form-group mt-3 col-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control validate" name="password" id="password">
                            <small></small>
                        </div>

                        <div class="form-group mt-3 col-12">
                            <button class="btn btn-outline-primary">Login</button>
                        </div>

                    </form>
                </div>
                <div class="text-center mt-3">
                    <a href="" class="badge bg-dark d-inline">Back Home</a>
                </div>

            </div>
        </div>
    </div>

    <script type="module">
        import {validate} from "./../assets/js/library.js";

            $("#login-form").on("submit", function(e){
                e.preventDefault();

                const form = document.querySelector("#login-form");
                const formData = new FormData(form);

                if(validate(".validate"))
                {
                    $.ajax({
                        url: "../actions/login.php",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function(){
                            $("#login-form button").text("Wait...").attr("disabled", "true");
                        },
                        success: function(data){
                            let result = JSON.parse(data);
                            
                            if(result.status == 1)
                            {
                                $("#login-form button").text("Login").removeAttr("disabled");
                                window.location.assign("dashboard.php");
                            }else
                            {
                                $("#login-form button").text("Login").removeAttr("disabled");
                                alert(result.msg);
                            }
                        }
                    });
                }
            });
    </script>
</body>
</html>