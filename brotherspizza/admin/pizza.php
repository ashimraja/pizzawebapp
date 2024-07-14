<?php include('includes/config.php') ?>
<?php include('includes/header.php') ?>
<?php include('includes/sidebar.php') ?>
<?php
if (isset($_POST['submit'])) 
  {
    $id="";
  $name = $_POST['name'];
  $price = $_POST['price'];
  $p_type = $_POST['p_type'];
  $image = "./images/".$_FILES['thumbnail']['name'];
  if($p_type=="Non Veg"){
    $id = "cp".uniqid();
  }
  else{
    $id = "vp".uniqid();
  }
  
  $target_dir = "../images/";
  $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $uploadOk = 1;
  


  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
      mysqli_query($db_conn,"INSERT INTO pizza (`p_id`,`p_name`, `p_price`, `p_image`,`p_type`) VALUES ('$id','$name', '$price', '$image','$p_type')");
    } else {
      echo "Sorry, there was an error uploading your file.";
      // header('Location: ../admin/courses.php');
    }
  }
}
if (isset($_POST['delete'])) {
    // Get the ID of the record to delete (replace 'record_id' with the actual name of your record ID field)
    $recordId = $_POST['delete_id'];
    $sql = "DELETE FROM pizza WHERE p_id = '$recordId'";

    mysqli_query($db_conn, $sql);
    // Call the deleteRecord function with the record ID

}
if(isset($_POST['update']))
{
    $id = $_POST['p_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $p_type=$_POST['p_type'];
    $old_image = $_POST['thumbnail_old'];
    $new_image = $_FILES['thumbnail']['name'];
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
    if($new_image!='')
    {
        $update_filename ='./images'.$_FILES['thumbnail']['name'];
    }
    else{
        $update_filename =$_POST['thumbnail_old'];
    }
    if ($new_image!='') {
        if (file_exists("../images/" . $new_image)) {
            $filename = $_FILES['thumbnail']['name'];
            // $_SESSION['status'] = "Sorry, file already exists." . $filename;
            header('Location: '.$_SERVER['PHP_SELF']);
          }
          
      }
      else
            {
                $query = "UPDATE pizza SET  p_name='$name', p_price='$price', p_image='$update_filename',p_type='$p_type' WHERE p_id='$id'";
                $query_run= mysqli_query($db_conn,$query);
                if($query_run)
                {
                    if($new_image!=''){
                        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
                        unlink("../images/".$old_image);
                    }
                    header('Location: pizza.php');
                }
                else{

                }
            }
      
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
                         EDIT PIZZA</h3>
                     </div>
                     <div class="card-body">
                        <?php
                        if(isset($_GET['id'])){
                            $pp_id = $_GET['id'];
                            $q= "SELECT * FROM pizza WHERE p_id='$pp_id'";
                            $q_run = mysqli_query($db_conn,$q);
                            if(mysqli_num_rows($q_run)>0)
                            { 
                                foreach($q_run as $pop)
                                {
                                ?>      
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                    <input type="hidden" name="p_id" value="<?=$pop['p_id']?>">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Pizza Name</label>
                                        <input type="text" name="name" value="<?= $pop['p_name']?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" value="<?= $pop['p_price']?>" id="price" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="p_type">Pizza Type</label>
                                        <input type="text" name="p_type" value="<?= $pop['p_type']?>" id="p_type" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control mb-3" type="file" name="thumbnail" id="thumbnail">
                                        <input type="hidden" name="thumbnail_old" value="<?php echo $pop['p_image']?>">
                                        <img  src=".<?=$pop['p_image']?>" alt="" height="100">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <button name="update" class="btn btn-success">Update  Pizza</button>
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
                            Pizza
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
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Pizza Type</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                    $count=1;
                                    $pizzadetail = get_pizza();  
                                    while($pizza= mysqli_fetch_object($pizzadetail)){?>
                                    <tr>
                                        <td><?=$count++?></td>
                                        <td><img src=".<?=$pizza->p_image?>" alt="" height="100"></td>
                                        <td><?=$pizza->p_name?></td>
                                        <td><?=$pizza->p_type?></td>
                                        <td><?=$pizza->p_price?></td>
                                        <td class='d-flex gap-2'><a class="btn btn-success" href="?id=<?=$pizza->p_id?>">Edit</a>
                                        <form method="post" style="display: inline;">
                                            <input type="hidden" name="delete_id" value="<?= $pizza->p_id ?>">
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
                            Add New Pizza
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="from-group">
                                <label for="title">Name</label>
                                <input class="form-control mb-2" type="text" name="name" placeholder="name" required>
                            </div>
                            <div class="from-group">
                                <label for="title">Price</label>
                                <input class="form-control mb-2" type="number" name="price" required>
                            </div>
                            <div class="from-group">
                                <label for="p_type">Pizza Type</label>
                                <input class="form-control mb-2" type="text" name="p_type" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control mb-2" type="file" name="thumbnail" id="thumbnail" required>
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
</main>
<?php include('includes/footer.php') ?>