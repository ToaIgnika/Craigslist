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

        <!-- Custom styles for this template -->
        <link href="css/searchbar.css" rel="stylesheet">
    </head>
    <style>
        body{
            margin: auto;
            max-width: 100%;
        }
        nav {
            padding-bottom: 100px;
        }
    </style>
<body>
<script>
    onload = function () {
        $(function() {
            $('#catAbb').change(function() {
                $('#subcatAbb').val('all');
                this.form.submit();
            });
        });
        $(function() {
            $('#subcatAbb').change(function() {
                this.form.submit();
            });
        });
    };
</script>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="index.php">Craigslist</a>
    <form  class="form-inline" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method = "get">
        <?php
        $cat = 'j';
        if (isset($_GET['catAbb'])) {
            $cat = $_GET['catAbb'][0];
        }
        load_cats($cat);

        $subcat = 'all';
        if (isset($_GET['subcatAbb'])) {
            $subcat = $_GET['subcatAbb'];
        }
        //echo $subcat;
        load_subcats($cat,$subcat);
        ?>

    <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">my account</a>
            </li>
    </ul>
</nav>
<br>
<br>

<div id="wrapper" class="toggled">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Start Bootstrap
                </a>
            </li>

            <li>
                <div>
                    <?php
                    $cl = '';
                    if (isset($_GET['check_list'])) {
                        $cl = $_GET['check_list'];
                    }
                    load_cat_checkboxes($cat,$subcat, $cl);
                    ?>
                </div>
            </li>
            <li class="form-inline">
                <button type="submit" class="btn btn-warning btn-sm">reset search</button>

                <button type="submit" class="btn btn-warning btn-sm">update search</button>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="form-inline">
            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle"><></a>
            <input class="form-control" type="text" placeholder="Search" style="width:70%; min-width:7em">
            <button class="btn btn-success" type="submit">Search</button>
            </div>
            <h3>Search results</h3>
            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>

        </div>
    </div>
    </form>

    <!-- /#page-content-wrapper -->
    <?php
    include_once "db.php";

    if($_GET['catAbb'] == 'jjj') {
            load_job_list();
        }

    if($_GET['catAbb'] == 'hhh') {
        load_housing_list();
    }
    ?>




</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<?php
function load_job_list()
{
    $db = getConnection2();
    $sql = "SELECT * FROM jobs ORDER BY post_date DESC";
    $result = $db->query($sql);
    //<a href="./display.php?data=Data1&data2=Data120">Click here</a>

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo "<li id='". $row['ID'] .  "'>";
            echo $row['post_date'] . " ";
            echo "<a href='postDetail.php/?post_ID=". $row['ID'] . "&cat=jjj" . "'>" . $row['posting_title'] . "</a>";
            echo " (" . $row['specific_location'] . ") ";
            echo "<br>";
            echo "</li>";
        }
    }
}

function load_housing_list() {
    $db = getConnection2();
    $sql = "SELECT * FROM housing ORDER BY post_date DESC";
    $result = $db->query($sql);
    //<a href="./display.php?data=Data1&data2=Data120">Click here</a>

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo "<li id='". $row['ID'] .  "'>";
            echo $row['post_date'] . " ";
            echo "<a href='postDetail.php/?post_ID=". $row['ID'] . "&cat=hhh". "'>" . $row['posting_title'] .  "</a>";
            echo " (" . $row['specific_location'] . ") ";
            echo "<br>";
            echo "</li>";
        }
    }
}


function load_cats($k = 'j') {
    echo '<select id="catAbb" name = "catAbb">';
    $c ='';
    $e ='';
    $s ='';
    $g ='';
    $h ='';
    $j ='';
    $p ='';
    $r ='';
    $b ='';

    if ($k == 'c') { // community
        $c = 'selected';
    } else if ($k == 'e'){ // events
        $e = 'selected';
    } else if ($k == 's'){ // for sale
        $s = 'selected';
    } else if ($k == 'g'){ // gigs
        $g = 'selected';
    } else if ($k == 'h'){ // housing
        $h = 'selected';
    } else if ($k == 'j'){ // jobs
        $j = 'selected';
    } else if ($k == 'p'){ // personals
        $p = 'selected';
    } else if ($k == 'r'){ // resumes
        $r = 'selected';
    } else if ($k == 'b'){ // services
        $b = 'selected';
    }
    echo "<option value='ccc' $c>community</option>
            <option value='eee' $e>events</option>
            <option value='sss' $s>for sale</option>
            <option value='ggg' $g>gigs</option>
            <option value='hhh' $h>housing</option>
            <option value='jjj' $j>jobs</option>
            <option value='ppp' $p>personals</option>
            <option value='rrr' $r>resumes</option>
            <option value='bbb' $b>services</option>";
    echo '</select>';
}

function load_subcats($k = 'j', $it = 'all') {
    $file_name = $k.$k.$k.".txt";

    $myArray = explode("\n", file_get_contents('catlist/'.$file_name));
    echo "<select id='subcatAbb'  name = 'subcatAbb'>";

    $all = '';
    if ($it == 'all') {
        $all = ' selected';
    }

    echo "<option value= 'all' $all>all</option>";
    foreach ($myArray as $s) {
        $sel = '1';
        $s = trim($s);
        if (strcmp($s,trim($it)) == 0) {
            $sel = 'selected';
        }
        echo "<option value='$s' $sel>$s</option>";
    }
    echo "</select>";
}

function load_cat_checkboxes($cat, $subcat = '', $arr = '') {
    // cases:
    // a. subcat == 0 && arr == 0 => load all, selected
    // b. subcat == 0 && arr != 0 => load with selected items
    // c. subcat != 0 && arr == 0 => don't load checkbox
    // d. subcat != 0 && arr != 0 => don't load checkbox
    // USE SAME LOGIC WHEN LOADING THE LIST (moded)
    if ($subcat != 'all') {

    } else {
        $file_name = $cat.$cat.$cat.".txt";
        $myArray = explode("\n", file_get_contents('catlist/'.$file_name));

        foreach ($myArray as $s) {
            $s = trim($s);
            $sel = 'checked';
            if ($arr != '' && !in_array($s, $arr)) {
                $sel = '';
            }
            echo "<input type='checkbox' value='$s' $sel name='check_list[]'>$s<br>";
        }
    }
}

?>