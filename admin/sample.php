<?php
include "../functions.php";

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
            <!--        topbar-->
            <?php
            include 'topbar.php';
            ?>
            <!--end topbar-->
            <div style="padding-top: 100px; padding-left: 250px;">
                <form action="" method="post">
                    <h1 style="padding-top: 100px; padding-left: 350px;">Sample Projects</h1>
                    <div style="padding-top: 50px; padding-left: 300px;">
                        <label for="project">Project Name</label>
                        <input type="text" name="project" placeholder="name of project">
                    </div>
                    <div style="padding-top: 30px; padding-left: 300px;">
                        <label for="typeofproject">Type of Project</label>
                        <select name="typeofproject" id="" style="width: 400px; height: 50px;">
                            <option value="">--select--</option>
                            <option value="application">Web Application</option>
                            <option value="site">Website</option>
                            <option value="software">Software</option>
                            <option value="design">UX/UI</option>
                            <option value="pages">Web pages</option>
                        </select>
                    </div>
                    <div style="padding-top: 30px; padding-left: 300px;">
                        <label for="">Project Details</label>
                        <textarea name="details" id="" cols="35" rows="6" placeholder="Enter details..."></textarea>
                    </div>
                    <div style="padding-top: 30px; padding-left: 400px;">
                        <input type="submit" class="btn btn-primary" name="sample">
                    </div>

                </form>
            </div>
        </div>
        <!--        end of inner content-->

    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>

