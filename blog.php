<?php
    include_once 'database/db_connect.php';
    $query = "SELECT * FROM admin_blogs";
    mysqli_query($con, $query);
    $res = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            
            h1{
                text-align: center;
                font-weight: bolder;
            }
            
            img{
                height: 30%;
            }
            
            p{
                text-align: center;
                font-weight: bold;
            }
            
            hr{
                border-top: 1px solid black;
                width: 90%;
            }
        </style>
    </head>
    
    <body>
      
      <div class="content">
            <?php
                while($row = mysqli_fetch_array($res)){
                    echo '<div id=img_div>';
                    echo '<h1>'.$row["title"].'</h1>';
                    echo '<center><img src="images_blog/'.$row["image"].'" stylle = "height: 30%;"></center>';
                    echo '<p>'.$row["description"].'</p>';
                    echo '<hr>';
                }
            ?>    
       </div>    
    </body>
</html>