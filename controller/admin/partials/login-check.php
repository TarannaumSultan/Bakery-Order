<?php
    //autherization access control
    //check if the user is logged in or not
    if(!isset($_SESSION['user'])){
        //if log in not set
        //user is not logged in and
        //redirect to lpogin page with msg
        $_SESSION['no-login-message']="<div class ='error text-center'>Please login to access Admin Panel.</div>";
        //redirect to login page 
        header('location:'.SITEURL.'controller/admin/login.php');
    }
    
?>