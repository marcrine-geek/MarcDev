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
        label{
            display: inline-block;
            width: 150px;
            font-size: 20px;
        }
        input[type = text]{
            border: 2px solid #9ca3af;
            border-radius: 5px;
            width: 300px;
            color: black;
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
            <form action="" style="">
                <div style="padding-top: 100px; padding-left: 300px;">
                    <label for="project">Project Name</label>
                    <input type="text" name="project" placeholder="name of project">
                </div>
                <div style="padding-top: 100px; padding-left: 300px;">
                    <label for="project">Project Name</label>
                    <input type="text" name="project" placeholder="name of project">
                </div>
            </form>
        </div>
        <!--        end of inner content-->

    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
