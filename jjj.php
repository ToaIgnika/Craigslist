<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-18
 * Time: 6:09 PM
 */

echo 'you are in jjj';

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
    body {
        margin: auto;
        max-width: 80%;
    }
</style>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <a class="navbar-brand mx-auto" href="index.php">Craigslist</a>
    <form class="form-inline mx-auto" action="/action_page.php">
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

        <div class="posting align-content-sm-center">


            <div class="title row fields">
                <label class="posting-title req">
                    <div class="label">posting title</div>
                    <input tabindex="1" type="text" name="PostingTitle" id="PostingTitle" maxlength="70" value="">
                </label>

                <label class="neighborhood std">
                    <div class="label">specific location</div>
                    <input type="text" tabindex="1" name="GeographicArea" id="GeographicArea" size="12" maxlength="40"
                           value=""></label>
                <label class="postal-code req">
                    <div class="label">postal code</div>
                    <input tabindex="1" id="postal_code" name="postal" size="7" maxlength="15" value="">
                </label>
            </div>

            <div class="row fields">
                <label class="PostingBody req">
                    <div>
                        <small class="onejobonly"><b>Only one job description per posting please.</b><br>Please see our
                            FAQ
                            for job posters<a target="_blank"
                                              href="https://www.craigslist.org/about/help/faq-job">&nbsp;[?]</a></small>
                        <span class="label">posting body</span>
                    </div>
                    <textarea class="req" tabindex="1" rows="5" cols="50" id="PostingBody"
                              name="PostingBody"></textarea>
                </label>
            </div>

            <div class="row">

            </div>

            <div class="row fields">
                <fieldset>
                    <legend>posting details</legend>
                    <div class="attrline"><label class="req select">
                            <div class="label">employment type</div>
                            <select tabindex="1" name="employment_type" id="employment_type">
                                <option value="">-</option>

                                <option value="1">full-time</option>
                                <option value="2">part-time</option>
                                <option value="3">contract</option>
                                <option value="4">employee's choice</option>

                            </select>
                        </label>
                    </div>

                </fieldset>
            </div>

            <div class="row fields">
                <label class="req"><span class="label">compensation</span>
                    <span id="compdet">please be as detailed as possible</span>
                    <input tabindex="1" class="nreq" size="80" id="remuneration" name="remuneration" value="">
                </label>

            </div>

            <fieldset style="margin-bottom: 1.5em;">
                <legend>contact info</legend>
                <div class="row fields" style="margin-bottom: 0;">
                    <span>
                        <label class="req" for="FromEMail">
                            <div class="label">email</div>
                        </label>
                        <input tabindex="1" type="text" class="req df" id="FromEMail" name="FromEMail"
                               placeholder="Your email address" value="" maxlength="60" autocapitalize="off">

                        <input tabindex="1" type="text" class="req df" id="ConfirmEMail" name="ConfirmEMail"
                            placeholder="Type email address again" value="" maxlength="60" autocapitalize="off">
                    </span>
                    <span id="oiab">


</span>
                </div>
                <br>
                <div class="row fields" style="margin-bottom: 0;">
                    <label class="contact_phone std">
                        <div class="label">phone number</div>
                        <input type="text" class="std" value="" name="contact_phone" id="contact_phone" size="12"
                               maxlength="16" tabindex="1">
                    </label>

                </div>
            </fieldset>

            Select image to upload:


            <input type="text" name="testText">
            <input type="file" name="fileToUpload" id="fileToUpload">

            <button tabindex="1" class="bigbutton" type="submit" name="go" value="Continue">continue</button>
        </div>


    </div>

    <div class="column" style="width:30%"></div>
</div>

</body>

</html>

