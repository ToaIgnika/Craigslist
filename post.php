<?php
/**
 * Created by PhpStorm.
 * U*ser: Yevhen
 * Date: 2018-03-17
 * Time: 11:19 AM
 */

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




<!--
 community
 housing
 personals
 for sale
 services
 jobs
 gigs
 -->
</body>

</html>

<?php
    session_start();
    if(!isset($_GET['category'])) {
        echo '';
        echo 'Pick your category';
        echo "</br>";
        echo "</br>";
        echo '<form action="post.php" >';
        echo '<input type="radio" name="category" value="ccc">Community<br>';
        echo '<input type="radio" name="category" value="hhh">Housing<br>';
        echo '<input type="radio" name="category" value="ppp">Personals<br>';
        echo '<input type="radio" name="category" value="sss">For Sale<br>';
        echo '<input type="radio" name="category" value="bbb">Services<br>';
        echo '<input type="radio" name="category" value="jjj">Jobs<br>';
        echo '<input type="radio" name="category" value="ggg">Gigs<br>';
        echo '<input type="submit" value="Submit">';
        echo '</form>';
    } elseif(!(isset($_GET['subcategory']))) {

        $file_name = $_GET['category'].".txt";
        $myArray = explode("\n", file_get_contents('catlist/'.$file_name));

        $action = $_GET['category'] . ".php";
        echo '<form action="'.$action.'" >';
        $k = false;
        $sel = 'checked';
        foreach ($myArray as $s) {
            $s = trim($s);
            if($k) {
                $sel = '';
            }
            $arr = '';
            echo "<input type='radio' value='$s' $sel name='subcategory'>$s<br>";
            $k = true;
        }
        echo '<input type="submit" value="Submit">';
        echo '</form>';

    }
?>

