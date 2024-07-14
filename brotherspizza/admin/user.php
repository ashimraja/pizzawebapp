<?php include('includes/config.php') ?>
<?php include('includes/header.php') ?>
<?php include('includes/sidebar.php') ?>
<?php
if (isset($_POST['submit'])) 
  {
    $id="cl".uniqid();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $post = $_POST['post'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    mysqli_query($db_conn,"INSERT INTO users (`u_id`,`firstname`, `lastname`, `u_post`,`email`,`password`) VALUES ('$id','$firstname', '$lastname', '$post','$email','$password')");
  }
if(isset($_POST['update']))
{
    $id = $_POST['u_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $post = $_POST['post'];
        $query = "UPDATE users SET  firstname='$firstname',lastname='$lastname', u_post='$post',password='$password',email='$email'  WHERE u_id='$id'";
        $query_run= mysqli_query($db_conn,$query);
        if($query_run)
        {
            header('Location: http://localhost/brothers_pizza/admin/user.php');
        }
}
if (isset($_POST['delete'])) {
    // Get the ID of the record to delete (replace 'record_id' with the actual name of your record ID field)
    $recordId = $_POST['delete_id'];
    $sql = "DELETE FROM users WHERE u_id = '$recordId'";

    mysqli_query($db_conn, $sql);
    // Call the deleteRecord function with the record ID

}
?>
<main>
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-8"> 
                <!-- Info boxes -->
                <?php
                if(isset($_REQUEST['id'])) {
                     ?><div class="card">
                     <div class="card-header py-2">
                       <h3 class="card-title">
                         EDIT User</h3>
                     </div>
                     <div class="card-body">
                        <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $q= "SELECT * FROM users WHERE u_id='$id'";
                            $q_run = mysqli_query($db_conn,$q);
                            if(mysqli_num_rows($q_run)>0)
                            { 
                                foreach($q_run as $User)
                                {
                                ?>      
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                    <input type="hidden" name="u_id" value="<?=$User['u_id']?>">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">First Name</label>
                                        <input type="text" name="firstname" value="<?= $User['firstname']?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Last Name</label>
                                        <input type="text" name="lastname" value="<?= $User['lastname']?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="<?= $User['email']?>"  id="email" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" value="<?= $User['password']?>"  id="password" class="form-control ">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="post">post</label>
                                        <input type="text" name="post" value="<?= $User['u_post']?>" id="post" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <button name="update" class="btn btn-success">Update  User</button>
                                    </div>
                                    </div>
                                </form>
                            <?php 
                                }
                            }
                            else{
                                ?>
                                <h4>No record found</h4>
                        <?php }
                        }
                        ?>
                     </div>
                   </div>
                 <?php } else { ?><div class="card">
                    <div class="card-header py-2">
                        <h2 class="card-title">
                            User
                        </h3>
                        <!-- <div class="card-tools">
                            <a href="?action=add-new" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New</a>
                        </div> -->
                    </div>
                    <div class="card-body" style="max-height: calc(100vh - 180px); overflow-y: auto;">
                        <div class="table-responsive ">
                            <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Post</th>
                                    <th>Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                    $count=1;
                                    $Userdetail = get_User();  
                                    while($User= mysqli_fetch_object($Userdetail)){?>
                                    <tr>
                                        <td><?=$count++?></td>
                                        <td><?=$User->firstname?> <?=$User->lastname?></td>
                                        <td><?=$User->email?></td>
                                        <td><?=$User->u_post?></td>
                                        <td>
                                            <a class="btn btn-success" href="?id=<?=$User->u_id?>">Edit</a>
                                            <form method="post" style="display: inline;">
                                                <input type="hidden" name="delete_id" value="<?= $User->u_id ?>">
                                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    
                                <?php }?>
                            </tbody>
                            </table>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Info boxes -->
                <div class="card">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                            Add New User
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input type="text" name="firstname"  class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input type="text" name="lastname"   class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email"  id="email" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password"  id="password" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label for="post">Post</label>
                                <input type="text" name="post"  id="post" class="form-control mb-2">
                            </div>
                            <button name="submit" class="btn btn-success float-right">Submit</button>
                        </form>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
<?php include('includes/footer.php') ?>