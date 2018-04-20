<?php
/**
 * Created by PhpStorm.
 * U*ser: Yevhen
 * Date: 2018-03-17
 * Time: 11:19 AM
 */
session_start();


include_once "db.php";

// Create connection
$db = getConnection2();

$result = $db->query("CREATE TABLE IF NOT EXISTS community(
            ID VARCHAR(40) NOT NULL,            
            posting_title VARCHAR(40),
            specific_location VARCHAR(40),
            postal_code VARCHAR(40),
            posting_description VARCHAR(600),
            email VARCHAR(40),
            phone_number VARCHAR(40),
            image_id VARCHAR(60),
            post_date VARCHAR(20),
            subcategory VARCHAR(20),
            PRIMARY KEY (ID)
            );");

$_SESSION['category'] = "ccc";
$_SESSION['subcategory'] = $_GET['subcategory'];

//include_once 'db.php';
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
    <form  class="form-inline mx-auto" action="search.php">
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

<div>
    <div class = "col" >

    </div>


    <div class = "col" >

        <form action="postImage.php" enctype="multipart/form-data">
            <div class = row>
                <div class = "col" >
                    <div class="label" tabindex="1">post title</div>
                    <input tabindex="1" type="text" name="PostingTitle" id="PostingTitle" maxlength="70" value="">
                </div>
                <div class = "col" >
                    <div class="label" tabindex="1">specific location</div>
                    <input tabindex="1" type="text" name="GeographicArea" id="GeographicArea" maxlength="70" value="">
                </div>
                <div class = "col" >
                    postal code
                    <br>
                    <input type="text" tabindex="1" name="postal" id="postal" size="12" maxlength="40" value="">
                </div>
            </div>

            <div class="label"> post description </div>
            <textarea tabindex="1" rows="10" cols = "100" id="PostingBody" name="PostingBody"></textarea>
            <br>

            <div class="label"> email </div>
            <input tabindex="1" type="text" class="req df" id="FromEMail" name="FromEMail" placeholder="Your email address" value="" maxlength="60" autocapitalize="off">
            <input tabindex="1" type="text" class="req df" id="ConfirmEMail" name="ConfirmEMail" placeholder="Type email address again" value="" maxlength="60" autocapitalize="off">

            <div class="label"> phone number </div>
            <input type="text" class="std" value="" name="contact_phone" id="contact_phone" size="12" maxlength="16" tabindex="1">
            <input type="number" tabindex="1" placeholder="day" pattern="[0-9]+" min="1" max="31" size="2" step="1" value="21" name="moveinDay" style="text-align-left">
            <input type="number" tabindex="2" placeholder="year" pattern="[0-9]+" min="2018" max="2028" size="4" step="1" value="2018" name="moveinYear" style="text-align-left">
            <BR>
            <BR>
            <input type="submit" value="Submit" size="200%">
        </form>

    </div>


</div>
</div>



</body>

</html>