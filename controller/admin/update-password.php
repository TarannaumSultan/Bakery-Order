<?php include('partials/menu.php');?>

<div class = "main-content">
    <div class ="wrapper">
    
        <h1>Change Password</h1>
        <br><br>
        <?php
            if(isset($_GET['id'])){
                $id =$_GET['id'];
            }
        ?>
        
        <form action="" method="POST">
            <table class ="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type ="password" name="new_password" placeholder ="New Password">
                        
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td colspan ="2">
                        <input type ="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>

<?php
    //check if the submit button is clicked or not
    if(isset($_POST['submit'])){
        //echo "Clicked";
        
        //1.Get the data from form 
        $id=$_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        
        //2. check if the user with current id and pass. exists or not
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
        //exec query
        $res = mysqli_query($conn, $sql);{
            //check if the data is avaialable or not
            $count =mysqli_num_rows($res);
            if($count==1){
                //user exists and pass can be changed 
                //echo "User Found";
                
                //check if the new pass and confirm pass match or Not
                
                if($new_password==$confirm_password){
                    //update password
                    //echo "Password is Matched ";
                    $sql2="UPDATE tbl_admin SET password= '$new_password' WHERE id = $id";
                    //exec mysqli_query
                    $res2 = mysqli_query($conn, $sql2);
                    //check if the query executed or Not
                    if ($res2== true){
                        //display msg
                        //redirect to manage admin with success msg
                        $_SESSION['change-pwd']="<div class = 'success'>Password Changed Succesfully.</div>";
                        //redirect the user
                        header('location:'.SITEURL.'controller/admin/manage-admin.php');
                    }
                    else{
                        //display error msg
                        //redirect to manage admin with error msg
                        $_SESSION['change-pwd']="<div class = 'error'>Failed to Change Password.</div>";
                        //redirect the user
                        header('location:'.SITEURL.'controller/admin/manage-admin.php');
                    }
                    
                }
                else{
                    //redirect to manage admin with error msg
                    $_SESSION['pwd-not-match']="<div class = 'error'>Password Did Not Match.</div>";
                    //redirect the user
                    header('location:'.SITEURL.'controller/admin/manage-admin.php');
                }
            }
            else{
            //user does not exists. Set msg and redirect
                $_SESSION['user-not-found']="<div class = 'error'> User Not Found.</div>";
                //redirect the user
                header('location:'.SITEURL.'controller/admin/manage-admin.php');
            }
        }
        
        //3. check if the current or new pass and confirm pass match or not
        //4.  change pass if all above is true
        
    }
?>

<?php include('partials/footer.php');?>