<?php include('partials/menu.php'); ?>
        
        <!--Main Content Section Starts-->
        <div class = "main-content">
            <div class ="wrapper">
                <h1> Manage Admin</h1> 
                <br/>
                
                
                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];//showing session msg
                        unset($_SESSION['add']);//removing session msg
                    }
                    if(isset($_SESSION['delete'])){
                        echo$_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    
                    if(isset($_SESSION['user-not-found'])){
                        echo($_SESSION['user-not-found']);
                        unset($_SESSION['user-not-found']);
                    }
                    if(isset($_SESSION['pwd-not-match'])){
                        echo($_SESSION['pwd-not-match']);
                        unset($_SESSION['pwd-not-match']);
                    }
                    
                    if(isset($_SESSION['change-pwd'])){
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }
                    
                ?>
                <br/><br/><br/>
                    <!--Button to add Admin-->
                <a href="add-admin.php" class= "btn-primary"> Add Admin</a>
                <br/>
                <br/>
                <br/>
                    
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    
                    <?php
                    //query to get all admin
                        $sql="SELECT*FROM tbl_admin";
                    //exec the query
                        $res= mysqli_query($conn, $sql);
                        //check if the query is exec or not
                        
                        if($res==TRUE)
                        {
                            //count rows to check if we have data in db table
                            $count = mysqli_num_rows($res);//funct to get all the rows in db table
                            $sn=1; //create var and assign it
                            //check the num of rowws
                            if($count>0){
                            //we have data in db table
                                while($rows=mysqli_fetch_assoc($res)){
                                //to get all the data from the db//
                                // will run as long as we have data in db table
                                //get indiv. data 
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username= $rows['username'];
                                    //display the values in our table
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username;?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>controller/admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL;?>controller/admin/update-admin.php?id=<?php echo $id;?>"class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL;?>controller/admin/delete-admin.php?id=<?php echo $id;?>"class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr> 
                                    <?php
                                
                                }
                            }
                        }
                    ?>
                    
                </table>
 
                
            </div>
        </div>
        <!--Main Content Section Ends-->
        
<?php include('partials/footer.php'); ?>