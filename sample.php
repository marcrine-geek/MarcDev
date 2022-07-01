<?php
require 'connection.php';
require 'fetchData.php';

$samples = fetchSamples($connection);


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
                <h1>sample projects</h1>
                <div style="padding-top: 40px; overflow-x: hidden; overflow-y: auto; height: 500px;">
                    <?php if (count($samples) > 0):?>
                        <?php foreach ($samples as $sample):
                            $project = $sample['project'];
                            $typeofproject = $sample['typeofproject'];
                            $details = $sample['details'];
                            ?>

                            <div style="border: 2px solid black; border-radius: 5px; margin-top: 5px; width: 50%;">
                                <p>
                                <h5>Name of Project:</h5><?php echo $project; ?> <br>
                                <h5>Type of Project:</h5><?php echo $typeofproject; ?><br>
                                <h5>Details:</h5><?php echo $details; ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h3>No Samples</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!--        end of inner content-->

    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>

