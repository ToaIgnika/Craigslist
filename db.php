<?php
/**
 * Created by PhpStorm.
 * User: Yevhen
 * Date: 2018-03-13
 * Time: 9:37 PM
 */

/*
 * dbname = "phfjhhmy_craigslist"
 *
 * cl_user
 * ^fHP1,Qth](&
 *
 * cl_adm
 * zAuFxkE+MOXF
 */


function getConnection() {
    $servername = "localhost";
    $username = "phfjhhmy_cl_user";
    $password = "^fHP1,Qth](&";
    $dbname = "phfjhhmy_craigslist";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error . "</br>" . $username . '|' . $password);
    }
    return $conn;
}

function getConnection2() {
    $servername = "drnserver.duckdns.org";
    $username = "eugene";
    $password = "g8xsuw&9(U]2\^<&";

// Create connection
    $db = new mysqli($servername, $username, $password);



    mysqli_select_db($db, 'cranklist') or
    die(mysqli_error($db));

    return $db;
}
