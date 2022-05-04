<?php
require 'connection.php';

if (isset($_POST['name']) && isset($_POST['comments']) && isset($_POST['time']))

    $name=$_POST['name'];
    $comments=$_POST['comments'];
    $time=date("Y-m-d H:i:s");

//    $stmt = $connection->prepare("INSERT INTO `comments` (`name`, `comments`, `time`) VALUES (?, ?, ?)");
//    $stmt->bind_param("sss", $name, $comments, $time);
//
//    if ($stmt->execute())
//    {
//        echo "message sent";
//    }else{
//        echo "message not sent";
//    }

    $insert = mysqli_query($connection, "INSERT INTO `comments` (`name`, `comments`, `time`) VALUES ('$name', '$comments', '$time') ");

    if ($insert === TRUE)
    {
        echo "message sent successfully";
    }
    else{
        echo "message not sent";
    }


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        a{
            text-decoration: none;
            color: white;
            padding-left: 5px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!--        sidebar-->
        <?php
        include 'sidebar.php';
        ?>
        <!--        end of sidebar-->

        <!--        inner content-->
        <div class="col-md-8">
            <div style="padding-top: 100px; padding-left: 250px;">
                <h1>Comments</h1>
                <div>
                    <form action="" method="post">
<!--                        post comments with username-->
                        <div>
                            <label for="name">username</label>
                            <input type="text" id="name" name="name" placeholder="username">
                        </div>
                        <textarea name="comments" id="comments" cols="40" rows="3" placeholder="Message..."></textarea>
                        <div style="padding-top: 20px;">
                            <input type="submit" name="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div>
<!--                    get comments from database-->
                </div>
            </div>
        </div>
        <!--        end of inner content-->

    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>


