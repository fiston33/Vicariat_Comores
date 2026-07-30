<?php

session_start();

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "vicariat_comores";


$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);

if(!$conn){
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="Admin_Css/adminbig.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>


    <div class="admin-container">

        <!-- SIDEBAR -->
        <div class="sidebar">
            <h2>Vicariat Apostolique des l'archipel des Comores</h2>

            <a href="../Admin/Dashboard.php"><i class="fa fa-home"></i> Dashboard</a>
            <a href="../Admin/newparish-list.php"><i class="fa fa-home"></i> Redesign Parishes</a>
            <a href="../Admin/news-list.php"><i class="fa fa-newspaper"></i> News</a>
            <a href="../Admin/events-list.php"><i class="fa fa-calendar"></i> Events</a>
            <a href="../Admin/parish_list.php"><i class="fa fa-church"></i> Parishes</a>
            <a href="../Admin/program-list.php"><i class="fa-solid fa-arrow-trend-up"></i> Programs</a>
            <a href="../Admin/messages.php"><i class="fa fa-envelope"></i> Messages</a>
            <a href="../Admin/garelly.php"><i class="fa fa-image"></i> Gallery</a>
            <a href="../Admin/donation.php"> <i class="fa-solid fa-hand-holding-heart"></i> Donations</a>

            <a href="../Admin/mediacenter.php"> <i class="fa-solid fa-hand-holding-heart"></i> Media Center</a>

            <!-- <a href="../Admin/members-list.php"> <i class="fa-solid fa-hand-holding-heart"></i> Membership</a> -->

            <a href="../Admin/users.php"> <i class="fa-solid fa-hand-holding-heart"></i> Users</a>

            <a href="../Admin/settings.php"> <i class="fa-solid fa-hand-holding-heart"></i> Settings</a>


            <a href="../Admin/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
