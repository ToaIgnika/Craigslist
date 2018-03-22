<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-19
 * Time: 10:54 PM
 */
        session_start();
        setSessionData();

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
    <form  class="form-inline mx-auto" action="/action_page.php">
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

<form action="posted.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>

</html>

<?PHP
    function setSessionData()
    {
        if ($_SESSION['category'] == "jjj") {
            $_SESSION['PostingTitle'] = $_GET['PostingTitle'];
            $_SESSION['GeographicArea'] = $_GET['GeographicArea'];
            $_SESSION['postal'] = $_GET['postal'];
            $_SESSION['PostingBody'] = $_GET['PostingBody'];
            $_SESSION['employment_type'] = $_GET['employment_type'];
            $_SESSION['remuneration'] = $_GET['remuneration'];
            $_SESSION['FromEMail'] = $_GET['FromEMail'];
            $_SESSION['contact_phone'] = $_GET['contact_phone'];
            $_SESSION['date'] = $date = date('M d');
        }

        if ($_SESSION['category'] == "hhh") {
            $_SESSION['PostingTitle'] = $_GET['PostingTitle'];
            $_SESSION['GeographicArea'] = $_GET['GeographicArea'];
            $_SESSION['postal'] = $_GET['postal'];
            $_SESSION['PostingBody'] = $_GET['PostingBody'];
            $_SESSION['square_feet'] = $_GET['Sqft'];
            $_SESSION['rent'] = $_GET['price'];
            $_SESSION['bedrooms'] = $_GET['bedrooms'];
            $_SESSION['bathrooms'] = $_GET['bathrooms'];
            $_SESSION['laundry'] = $_GET['laundry'];
            $_SESSION['parking'] = $_GET['parking'];
            $_SESSION['move_in_day'] = $_GET['moveinDay'];
            $_SESSION['move_in_month'] = $_GET['moveinMonth'];
            $_SESSION['move_in_year'] = $_GET['moveinYear'];
           // $_SESSION[''] = $_GET[''];

            $_SESSION['email'] = $_GET['FromEMail'];
            $_SESSION['phone_number'] = $_GET['contact_phone'];
            $_SESSION['date'] = $date = date('M d');

        }
    }
?>