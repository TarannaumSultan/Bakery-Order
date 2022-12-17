<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Add Admin</h1>
        <br/><br/>
        <?php
            if(isset($_SESSION['add'])){
                echo$_SESSION['add'];//display msg
                unset($_SESSION['add']);//remove msg
            }
        ?>
        
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your Name">
                    </td>
                    
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type ="password" name="password" placeholder="Your Password">
                    </td>
                </tr>
                <tr>
                    <td colspan ="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>
<?php 
    //process the value from Form and Save it in DB//
    //Check whether the submit button is clicked or not//
    
    if(isset($_POST["submit"])){
    //Button Clicked//
        //echo "Button Clicked";
        
        //1.Get the data from the Form//
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password= md5($_POST['password']);//Password Encryption with md5//
        
        //2.SQL query to save the data into DB//
        $sql="INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        
        
        ";
    
        //3.Executing query and saving data into DB//
        $res= mysqli_query ($conn, $sql)or die(mysqli_error());
        //4.Check whether the(query is executed) data is inserted or not and display message//
        if($res==TRUE){
            //data inserted successfully
            //echo "Data Inserted";
            //creat a session variable to display message
            $_SESSION['add']="<div class='success'>Admin Added Succesfully.</div>";
            //redirect page to manage admin
            header("location:".SITEURL.'controller/admin/manage-admin.php');
        }
        else{
            //failed to insert data
            //echo "Failed to Insert Data";
            //creat a session variable to display message
            $_SESSION['add']="<div class='error'>Failed to Add Admin.</div>";
            //redirect page to add- admin
            header("location:".SITEURL.'controller/admin/add-admin.php');
        }
    }
?>