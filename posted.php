<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-19
 * Time: 12:46 PM
 */
session_start();
include_once "db.php";
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
    <?php
        $new_ID = md5(uniqid());
        uploadFile($new_ID);
        sendData($new_ID);
        echo "your post has been uploaded!";
    ?>
    </body>
</html>


<?php

function uploadFile($new_ID) {

    $target_dir = "uploads/";
    $target_file = $target_dir . $new_ID . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //file is image
            $uploadOk = 1;
        } else {
            // file is not an image
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $_SESSION['profile'] = 1;
    $_SESSION['fileToUpload'] = $target_file;


}

function sendData($new_ID)
{
    $db = getConnection2();

    if($_SESSION['category'] == "ccc") {
        mysqli_query($db, "
        INSERT INTO community(
          ID,
          posting_title,
          specific_location,
          postal_code,
          posting_description,
          email,
          phone_number,
          image_id,
          post_date,
          subcategory
        ) VALUES (
          '$new_ID',
          '{$_SESSION['PostingTitle']}',
          '{$_SESSION['GeographicArea']}',
          '{$_SESSION['postal']}',
          '{$_SESSION['PostingBody']}',
          '{$_SESSION['email']}',
          '{$_SESSION['phone_number']}',
          '{$_SESSION['fileToUpload']}',
          '{$_SESSION['date']}',
          '{$_SESSION['subcategory']}'
        );"
        ) or die(mysqli_error($db));
    }

    if($_SESSION['category'] == "eee") {
        mysqli_query($db, "
        INSERT INTO housing(
          ID,
          posting_title,
          specific_location,
          postal_code,
          housing_description,
          square_feet,
          rent,
          bathrooms,
          bedrooms,
          laundry,
          parking,
          move_in_month,
          move_in_day,
          move_in_year,
          email,
          phone_number,
          image_id,
          post_date,
          subcategory
        ) VALUES (
          '$new_ID',
          '{$_SESSION['PostingTitle']}',
          '{$_SESSION['GeographicArea']}',
          '{$_SESSION['postal']}',
          '{$_SESSION['PostingBody']}',
          '{$_SESSION['square_feet']}',
          '{$_SESSION['rent']}',
          '{$_SESSION['bathrooms']}',
          '{$_SESSION['bedrooms']}',
          '{$_SESSION['laundry']}',
          '{$_SESSION['parking']}',
          '{$_SESSION['move_in_month']}',
          '{$_SESSION['move_in_day']}',
          '{$_SESSION['move_in_year']}',
          '{$_SESSION['email']}',
          '{$_SESSION['phone_number']}',
          '{$_SESSION['fileToUpload']}',
          '{$_SESSION['date']}',
          '{$_SESSION['subcategory']}'
        );"
        ) or die(mysqli_error($db));
    }

    if($_SESSION['category'] == "ggg") {
        mysqli_query($db, "
        INSERT INTO housing(
          ID,
          posting_title,
          specific_location,
          postal_code,
          housing_description,
          square_feet,
          rent,
          bathrooms,
          bedrooms,
          laundry,
          parking,
          move_in_month,
          move_in_day,
          move_in_year,
          email,
          phone_number,
          image_id,
          post_date,
          subcategory
        ) VALUES (
          '$new_ID',
          '{$_SESSION['PostingTitle']}',
          '{$_SESSION['GeographicArea']}',
          '{$_SESSION['postal']}',
          '{$_SESSION['PostingBody']}',
          '{$_SESSION['square_feet']}',
          '{$_SESSION['rent']}',
          '{$_SESSION['bathrooms']}',
          '{$_SESSION['bedrooms']}',
          '{$_SESSION['laundry']}',
          '{$_SESSION['parking']}',
          '{$_SESSION['move_in_month']}',
          '{$_SESSION['move_in_day']}',
          '{$_SESSION['move_in_year']}',
          '{$_SESSION['email']}',
          '{$_SESSION['phone_number']}',
          '{$_SESSION['fileToUpload']}',
          '{$_SESSION['date']}',
          '{$_SESSION['subcategory']}'
        );"
        ) or die(mysqli_error($db));
    }

    if($_SESSION['category'] == "hhh") {
        mysqli_query($db, "
        INSERT INTO housing(
          ID,
          posting_title,
          specific_location,
          postal_code,
          housing_description,
          square_feet,
          rent,
          bathrooms,
          bedrooms,
          laundry,
          parking,
          move_in_month,
          move_in_day,
          move_in_year,
          email,
          phone_number,
          image_id,
          post_date,
          subcategory
        ) VALUES (
          '$new_ID',
          '{$_SESSION['PostingTitle']}',
          '{$_SESSION['GeographicArea']}',
          '{$_SESSION['postal']}',
          '{$_SESSION['PostingBody']}',
          '{$_SESSION['square_feet']}',
          '{$_SESSION['rent']}',
          '{$_SESSION['bathrooms']}',
          '{$_SESSION['bedrooms']}',
          '{$_SESSION['laundry']}',
          '{$_SESSION['parking']}',
          '{$_SESSION['move_in_month']}',
          '{$_SESSION['move_in_day']}',
          '{$_SESSION['move_in_year']}',
          '{$_SESSION['email']}',
          '{$_SESSION['phone_number']}',
          '{$_SESSION['fileToUpload']}',
          '{$_SESSION['date']}',
          '{$_SESSION['subcategory']}'
        );"
        ) or die(mysqli_error($db));
    }

    if($_SESSION['category'] == "jjj") {
        mysqli_query($db, "
        INSERT INTO jobs(
          ID,
          posting_title,
          specific_location,
          postal_code,
          job_description,
          employment_type,
          compensation,
          email,
          phone_number,
          image_id,
          post_date,
          subcategory
        ) VALUES (
          '$new_ID',
          '{$_SESSION['PostingTitle']}',
          '{$_SESSION['GeographicArea']}',
          '{$_SESSION['postal']}',
          '{$_SESSION['PostingBody']}',
          '{$_SESSION['employment_type']}',
          '{$_SESSION['remuneration']}',
          '{$_SESSION['FromEMail']}',
          '{$_SESSION['contact_phone']}',
          '{$_SESSION['fileToUpload']}',
          '{$_SESSION['date']}',
          '{$_SESSION['subcategory']}'
        );"
        ) or die(mysqli_error($db));
    }

    if($_SESSION['category'] == "ppp") {
        mysqli_query($db, "
        INSERT INTO housing(
          ID,
          posting_title,
          specific_location,
          postal_code,
          housing_description,
          square_feet,
          rent,
          bathrooms,
          bedrooms,
          laundry,
          parking,
          move_in_month,
          move_in_day,
          move_in_year,
          email,
          phone_number,
          image_id,
          post_date,
          subcategory
        ) VALUES (
          '$new_ID',
          '{$_SESSION['PostingTitle']}',
          '{$_SESSION['GeographicArea']}',
          '{$_SESSION['postal']}',
          '{$_SESSION['PostingBody']}',
          '{$_SESSION['square_feet']}',
          '{$_SESSION['rent']}',
          '{$_SESSION['bathrooms']}',
          '{$_SESSION['bedrooms']}',
          '{$_SESSION['laundry']}',
          '{$_SESSION['parking']}',
          '{$_SESSION['move_in_month']}',
          '{$_SESSION['move_in_day']}',
          '{$_SESSION['move_in_year']}',
          '{$_SESSION['email']}',
          '{$_SESSION['phone_number']}',
          '{$_SESSION['fileToUpload']}',
          '{$_SESSION['date']}',
          '{$_SESSION['subcategory']}'
        );"
        ) or die(mysqli_error($db));
    }

    if($_SESSION['category'] == "sss") {
        mysqli_query($db, "
        INSERT INTO housing(
          ID,
          posting_title,
          specific_location,
          postal_code,
          housing_description,
          square_feet,
          rent,
          bathrooms,
          bedrooms,
          laundry,
          parking,
          move_in_month,
          move_in_day,
          move_in_year,
          email,
          phone_number,
          image_id,
          post_date,
          subcategory
        ) VALUES (
          '$new_ID',
          '{$_SESSION['PostingTitle']}',
          '{$_SESSION['GeographicArea']}',
          '{$_SESSION['postal']}',
          '{$_SESSION['PostingBody']}',
          '{$_SESSION['square_feet']}',
          '{$_SESSION['rent']}',
          '{$_SESSION['bathrooms']}',
          '{$_SESSION['bedrooms']}',
          '{$_SESSION['laundry']}',
          '{$_SESSION['parking']}',
          '{$_SESSION['move_in_month']}',
          '{$_SESSION['move_in_day']}',
          '{$_SESSION['move_in_year']}',
          '{$_SESSION['email']}',
          '{$_SESSION['phone_number']}',
          '{$_SESSION['fileToUpload']}',
          '{$_SESSION['date']}',
          '{$_SESSION['subcategory']}'
        );"
        ) or die(mysqli_error($db));
    }


/*
 * $_SESSION['PostingTitle'] = $_GET['PostingTitle'];
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

            $_SESSION['FromEMail'] = $_GET['FromEMail'];
            $_SESSION['contact_phone'] = $_GET['contact_phone'];
            $_SESSION['date'] = $date = date('M d');
 */
}

function getThisPostID() {

    $db = getConnection2();
    $sql = "SELECT * FROM jobs WHERE fromEMail = '{$_SESSION['FromEMail']}'";
    $result = $db->query($sql);

    //if ($result->num_rows > 0) {
      //  while ($row = $result->fetch_assoc()) {
        //    echo "<header style='font-size: 200%'>" . $row['posting_title'] . "</header>";
          //  echo "<p>". $row['job_description'] . "</p>";
        //}
    //}
}