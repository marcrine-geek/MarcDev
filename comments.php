<?php
require 'connection.php';
require 'fetchData.php';

$all_comments = fetchComments($connection);

//$user = fetchUser($connection, $_GET['id']);

$name = $_POST['name'];
$comments = $_POST['comments'];
$time = date("Y-m-d H:i:s");


if (isset($name) && isset($comments) && isset($time))
{
    $sql = "INSERT INTO `comments`(`name`, `comments`, `time`) VALUES('$name', '$comments', '$time')";

    if(mysqli_query($connection, $sql)){
        $all_comments = fetchComments($connection);
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }

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
                <div style="padding-top: 10px; overflow-x: hidden; overflow-y: auto; height: 500px;">
                    <?php if (count($all_comments) > 0):?>
                        <?php foreach ($all_comments as $comment):
                            $name = $comment['name'];
                            $comments = $comment['comments'];
                            $time = $comment['time'];
                            ?>

                            <div style="border: 2px solid black; border-radius: 5px; margin-top: 5px; width: 50%;">
                                <p>
                                    <?php echo $name; ?> : <br>
                                    <?php echo $comments; ?><br>
                                    <?php echo $time; ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h3>No New Messages</h3>
                    <?php endif; ?>
                </div>
                <div style="padding-top: 50px;">
                    <form action="" method="post">
<!--                        post comments with username-->
                        <div>
                            <input type="text" id="name" name="name" placeholder="username">
                        </div>
                        <div style="padding-top: 5px;">
                            <textarea name="comments" id="comments" cols="40" rows="3" placeholder="Message..."></textarea>
                        </div>
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


