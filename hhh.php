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

$result = $db->query("CREATE TABLE IF NOT EXISTS housing(
            ID VARCHAR(40) NOT NULL,            
            posting_title VARCHAR(40),
            specific_location VARCHAR(40),
            postal_code VARCHAR(40),
            housing_description VARCHAR(600),
            square_feet VARCHAR(40),
            rent VARCHAR(40),
            bathrooms VARCHAR(40),
            bedrooms VARCHAR(40),
            laundry VARCHAR(40),
            parking VARCHAR(40),
            move_in_month VARCHAR(40),
            move_in_day VARCHAR(40),
            move_in_year VARCHAR(40),
            email VARCHAR(40),
            phone_number VARCHAR(40),
            image_id VARCHAR(60),
            post_date VARCHAR(20),
            subcategory VARCHAR(20),
            PRIMARY KEY (ID)
            );");

$_SESSION['category'] = "hhh";
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
        <label>
    <div class="label">ft2</div>
    <input type="text" tabindex="1" size="4" maxlength="6" name="Sqft" id="Sqft" value="0">
        </label>

        <label style="text-align-left">
            <div class="label">rent </div>
            <input type="text" tabindex="0" size="4" maxlength="11" name="price" value="">
        </label>


    <label style="text-align-left">
    <div class="label">bathrooms</div class="label">
        <select tabindex="1" name="bathrooms" id="bathrooms">
            <option>-</option>
            <option value="1">shared</option>
            <option value="2">split</option>
            <option value="3">1</option>
            <option value="4">1.5</option>
            <option value="5">2</option>
            <option value="6">2.5</option>
            <option value="7">3</option>
            <option value="8">3.5</option>
            <option value="9">4</option>
            <option value="10">4.5</option>
            <option value="11">5</option>
            <option value="12">5.5</option>
            <option value="13">6</option>
            <option value="14">6.5</option>
            <option value="15">7</option>
            <option value="16">7.5</option>
            <option value="17">8</option>
            <option value="18">8.5</option>
            <option value="19">9+</option>
        </select>
    </label>
    <label style="text-align-left">
        <div class="label">bedrooms</div>
        <select tabindex="1" name="bedrooms" id="bedrooms">
            <option>-</option>
            <option value="1">shared</option>
            <option value="2">split</option>
            <option value="3">1</option>
            <option value="4">1.5</option>
            <option value="5">2</option>
            <option value="6">2.5</option>
            <option value="7">3</option>
            <option value="8">3.5</option>
            <option value="9">4</option>
            <option value="10">4.5</option>
            <option value="11">5</option>
            <option value="12">5.5</option>
            <option value="13">6</option>
            <option value="14">6.5</option>
            <option value="15">7</option>
            <option value="16">7.5</option>
            <option value="17">8</option>
            <option value="18">8.5</option>
            <option value="19">9+</option>
        </select>
    </label>

    <label style="text-align-left">
        <div class="label">laundry</div>
        <select tabindex="1" name="laundry" id="laundry">
            <option value="">-</option>

            <option value="1">w/d in unit</option>
            <option value="4">w/d hookups</option>
            <option value="2">laundry in bldg</option>
            <option value="3">laundry on site</option>
            <option value="5">no laundry on site</option>

        </select>
    </label>

    <label style="text-align-left">

        <div class="label">parking</div>
        <select tabindex="1" name="parking" id="parking">
            <option value="">-</option>

            <option value="1">carport</option>
            <option value="2">attached garage</option>
            <option value="3">detached garage</option>
            <option value="4">off-street parking</option>
            <option value="5">street parking</option>
            <option value="6">valet parking</option>
            <option value="7">no parking</option>

        </select>
    </label>
        <div class="label"> email </div>
        <input tabindex="1" type="text" class="req df" id="FromEMail" name="FromEMail" placeholder="Your email address" value="" maxlength="60" autocapitalize="off">
        <input tabindex="1" type="text" class="req df" id="ConfirmEMail" name="ConfirmEMail" placeholder="Type email address again" value="" maxlength="60" autocapitalize="off">

        <div class="label"> phone number </div>
        <input type="text" class="std" value="" name="contact_phone" id="contact_phone" size="12" maxlength="16" tabindex="1">
        <div>Available on</div>
        <select style="margin-right:0px" name="moveinMonth" tabindex="1"><option value="1">jan</option><option value="2">feb</option><option selected="" value="3">mar</option><option value="4">apr</option><option value="5">may</option><option value="6">jun</option><option value="7">jul</option><option value="8">aug</option><option value="9">sep</option><option value="10">oct</option><option value="11">nov</option><option value="12">dec</option></select>
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