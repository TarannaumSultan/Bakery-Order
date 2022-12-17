<?php 
    include('../../model/config/constants.php');
    include('login-check.php');
?>

<html>
    <head>
        <title>Bakery Order Website - Home Page </title>
        <link rel="stylesheet" href="../../view/css/admin.css">
    </head>
    <body>
        <!--Menu Section Starts-->
        <div class = "menu text-center">
            <div class ="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-bakery-item.php">Bakery Items</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!--Menu Section Ends-->