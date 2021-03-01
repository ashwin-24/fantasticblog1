<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php
            //error_reporting(0);
            include 'database/db_connect.php';
            session_start();
            if(isset($_SESSION["usr"])){
                header("location:admin.php");
            }
            if(isset($_POST["login"])){
                if(empty($_POST["usr"]) && empty($_POST["pwd"])){
                    echo '<script>alert("Both fields are mandatory")</script>';
                }
                else{
                    $usr = mysqli_real_escape_string($con, $_POST["usr"]);
                    $pwd = mysqli_real_escape_string($con, $_POST["pwd"]);
                    $query = "SELECT * FROM admin_users WHERE username='$usr' AND password='$pwd'";
                    $res = mysqli_query($con, $query);
                    if(mysqli_num_rows($res) > 0){
                        $_SESSION['usr'] = $usr;
                        header("location:admin.php");
                    }
                    else{
                        echo '<script>alert("Please check your username or password")</script>';
                    }
                }
            }
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            label{ 
                float: left; 
            }
            
            body{
                display: flex;
            }
            
            form{
                display: inline-block;
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                width: 300px;
   		        height: 50%;
   		        margin: auto;
            }
        </style>
    </head>
    
    <body>
       <div class="container">
            <form method="post">
                <div class="form-group">
                    <h2 align="center">Admin SignIn</h2><br><br>
                    <label>Username:&nbsp;</label>
                    <input type="text" name="usr" class="form-control" style="width: 70%" placeholder="username"/>
                    <br>
                    <label>Password:&nbsp;</label>
                    <input type="password" name="pwd" class="form-control" style="width: 70%" placeholder="password"/>
                    <br>
                    <input type="submit" name="login" value="Login" class="btn btn-info"/>
                </div>
            </form>
       </div>
    </body>
</html>