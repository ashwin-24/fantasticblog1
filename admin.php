<?php
    $msg="";
    //if submit button is pressed
    if(isset($_POST["submit"])){
        $target = "images_blog/".basename($_FILES['imgs']['name']);
        include_once 'database/db_connect.php';
        
        $title = $_POST['title'];
        $img = $_FILES['imgs']['name'];
        $desc = $_POST['desc'];
        
        $query = "INSERT INTO admin_blogs(title, description, image) VALUES ('$title', '$desc', '$img')";
        mysqli_query($con, $query);
        
        move_uploaded_file($_FILES['imgs']['tmp_name'], $target);
        header("location:blog.php");
    }
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php 
            session_start();
            if(!isset($_SESSION['usr']))
                header("location:admin-signin.php");
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
                width: 320px;
   		        height: 70%;
   		        margin: auto;
            }
            
            textarea{
                resize: none;
            }
            
            p{
                color: darkgreen;
            }
        </style>
    </head>
    
    <body>
      
      <div class="container">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <h2 align="center">Blog Details</h2><br>
                    <label>Title:&nbsp;</label>
                    <input type="text" name="title" class="form-control" style="width: 70%"/>
                    <br>
                    <label>Description:</label><br>
                    <textarea rows="6" class="form-control" name="desc"></textarea>
                    <br/>
                    <label>Add Images:&nbsp;</label>    
                    <input type="file" name="imgs" accept="image/*" class="form-control" style="width: 70%" multiple/>
                    <p> Hold ctrl or shift key to select multiple files</p><br/>
                    <input type="submit" name="submit" value="Submit" class="btn btn-info"/>
                </div>
            </form>
       </div>    
    </body>
</html>