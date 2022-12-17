<?php
    //include constants.php for SITEURL 
    include('../../model/config/constants.php');
    
    //1.destroy the session and redirect to login page
    session_destroy();//unsets $_SESSION['user']
    header('location:'.SITEURL.'controller/admin/login.php');
?>