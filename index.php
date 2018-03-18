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
            <a class="nav-link" href="#">post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">my account</a>
        </li>
    </ul>
</nav>
<div class="container">
    <br>
    <div class="row">
        <div class="col">
            <?php
            load_index_list('Community', 'ccc.txt');
            load_index_list('Personals', 'ppp.txt');
            load_index_list('Services', 'bbb.txt');
            ?>
        </div>

        <div class="col">
            <?php
            load_index_list('Housing', 'hhh.txt');
            load_index_list('For Sale', 'sss.txt');
            ?>
        </div>

        <div class="col">
            <?php
            load_index_list('Jobs', 'jjj.txt');
            load_index_list('Gigs', 'ggg.txt');
            load_index_list('Resume', 'rrr.txt');
            ?>
        </div>
    </div>
</div>
<?php

// load table from the file
// TODO create proper href= tags to correlate with each section (if possible)
function load_index_list($name, $file_name) {
    //$myArray = file('catlist/'.$file_name);
    //sets the keys to the array equal to the values
    //$myArray = array_combine($myArray, $myArray);
    $myArray = explode("\n", file_get_contents('catlist/'.$file_name));

    echo '<table class="table table-sm">
                <thead class="thead-light">
                <tr >
                    <th colspan="2"><a href="search.php?catAbb='.substr($file_name, 0,3).'" class="">'.$name.'</a></th>
                </tr>
                </thead>
                <tbody>';
    for ($i = 0; $i <= sizeof($myArray)/2; ++$i) {
        $f_l = $myArray[$i];
        if ($i * 2 == sizeof($myArray)) {
            $f_r = "";
        } else {
            $f_r = $myArray[$i + (sizeof($myArray))/2];
        }
        // TODO encode url for search page
        echo ' <tr>
                    <td><a href="search.php?catAbb='.substr($file_name, 0,3)."&subcatAbb=$f_l".'" class="">'.$f_l.'</a></td>
                    <td><a href="search.php?catAbb='.substr($file_name, 0,3)."&subcatAbb=$f_r".'" class="">'.$f_r.'</a></td>
                </tr>';
    }
    echo '</tbody>
            </table>';

}
?>