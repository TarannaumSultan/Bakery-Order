<?php 

//include constants.php file here
include('../../model/config/constants.php');
//1.get the id of admin to be deleted
$id =$_GET['id'];

//2.create sql query to delete admin 
$sql="DELETE FROM tbl_admin WHERE id=$id";

//exec query
$res = mysqli_query($conn, $sql);

//check if the query exec successfully or not
if($res==true){
//que. exec successfully and admin is deleted
    //echo "Admin Deleted";
    //session var to display msg 
    $_SESSION['delete']="<div class='success'>Admin Deleted Successfully.</div>";
    //rediecte to manage-adimin pg
    header('location:'.SITEURL.'controller/admin/manage-admin.php');
}
else{
//failed to delete admin
    //echo "Failed to Delete Admin";
    
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
    header('location:'.SITEURL.'controller/admin/manage-admin.php');
}

//3. redirect to manage-admin page with msg(succes/error)
?>