<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-19
 * Time: 4:48 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<style>
    body{
        margin: auto;
        max-width: 80%;
    }
</style>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <a class="navbar-brand mx-auto" href="index.php">Craigslist</a>
    <form  class="form-inline mx-auto" action="action_page.php">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="post.php">post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">my account</a>
        </li>
    </ul>

</nav>




<!--
 community
 housing
 personals
 for sale
 services
 jobs
 gigs
 -->


<div class="row">
    <div class="column" style="width: 30%"></div>
    <div class="column" style="width: 40%">
        <?php
        if($_GET['cat'] == "hhh") {
            generate_housing_detail();
        }
        if($_GET['cat'] =='jjj'){
            generate_job_detail();
        }


        ?>
    </div>
    <div class="column" style="width: 30%"></div>
</div>

</body>

</html>


<?php

function generate_housing_detail() {
    include_once "db.php";
    $db = getConnection2();
    $sql = "SELECT * FROM housing WHERE ID = '{$_GET['post_ID']}'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo "<b style='font-size: 200%'>" . $row['posting_title'] .
                "</b>";
            echo "<text>" . " (" . $row['specific_location'] . ")".  "</text>";
            echo "<br>";
            echo "<b>Rent: </b>" . " <text> ". $row['rent'] . "</text>";
            echo"<br>";
            echo "<b>Available Starting: </b>" . " <text> ". $row['move_in_month'] . "/" . $row['move_in_day'] ."/" . $row['move_in_year']  . "</text>";

            echo "<img src='" ."http://localhost/Craiglist/" . $row['image_id'] . "'>";
            //echo "http://localhost/Craiglist/" . $row['image_id'];
            echo "<p>". $row['housing_description'] . "</p>";
            echo "<a href=\"mailto:" . $row['email'] . "?Subject=Hello%20again\" target=\"_top\">Send Email</a>";
        }
    }
}

function generate_job_detail() {
    include_once "db.php";
    $db = getConnection2();
    $sql = "SELECT * FROM jobs WHERE ID = '{$_GET['post_ID']}'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo "<b style='font-size: 200%'>" . $row['posting_title'] .
                "</b>";
            echo "<text>" . " (" . $row['specific_location'] . ")".  "</text>";
            echo "<br>";
            echo "<b>Compensation</b>" . " <text> ". $row['compensation'] . "</text>";
            echo"<br>";
            $empType = generateEmpType($row['employment_type']);
            echo "<b>Employment Type</b>" . " <text> ". $empType . "</text>";

            echo "<img src='" ."http://localhost/Craiglist/" . $row['image_id'] . "'>";
            //echo "http://localhost/Craiglist/" . $row['image_id'];
            echo "<p>". $row['job_description'] . "</p>";
            echo "<a href=\"mailto:" . $row['email'] . "?Subject=Hello%20again\" target=\"_top\">Send Email</a>";
        }
    }
}

function generateEmpType($oldEmpType) {
    if($oldEmpType == 1 ) {
        return "full-time";
    } else if ($oldEmpType == 2) {
        return "part-time";
    } else if ($oldEmpType ==3) {
        return "contract";
    } else if ($oldEmpType == 4) {
        return "employee's choice";
    }
}