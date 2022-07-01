<?php
require '../connection.php';
require '../fetchData.php';
include "../functions.php";

$users = fetchUsers($connection);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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
<!--            topbar-->
            <?php
            include 'topbar.php';
            ?>
<!--            end topbar-->

            <h1 style="padding-left: 300px; padding-top: 30px;">Available Users</h1>

            <table style="margin-left: 200px; margin-top: 50px;">
                <tr>
                    <th style="">FirstName</th>
                    <th style="padding-left: 20px;">LastName</th>
                    <th style="padding-left: 20px;">UserName</th>
                    <th style="padding-left: 20px;">Email</th>
                    <th style="padding-left: 20px;">Edit</th>
                    <th style="padding-left: 20px;">Delete</th>
                </tr>

                <?php if (count($users) > 0 ): ?>
                    <?php foreach ($users as $user):
                        $fname = $user['fname'];
                        $lname = $user['lname'];
                        $uname = $user['uname'];
                        $email = $user['email'];
                        ?>
                        <tr>
                            <td><?php echo $fname; ?></td>
                            <td style="padding-left: 20px;"><?php echo $lname; ?></td>
                            <td style="padding-left: 20px;"><?php echo $uname; ?></td>
                            <td style="padding-left: 20px;"><?php echo $email; ?></td>
                            <td style="padding-left: 20px;"><button class="btn btn-primary">Edit</button></td>
                            <td style="padding-left: 20px;"><button class="btn btn-danger">Delete</button></td>
                        </tr>
                    <?php endforeach;?>
                <?php else: ?>
                    <h2>No users</h2>
                <?php endif; ?>
            </table>
        </div>
        <!--        end of inner content-->

    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>