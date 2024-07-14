<?php include('includes/config.php') ?>
<?php include('includes/header.php') ?>
<?php include('includes/sidebar.php') ?>
<?php
if (isset($_POST['submit'])) 
  {
    $id = "d".uniqid();
  $name = $_POST['name'];
  $price = $_POST['price'];
  $image = "./images/".$_FILES['thumbnail']['name'];
  
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
      mysqli_query($db_conn,"INSERT INTO drinks (`d_id`,`d_name`, `d_price`, `d_image`) VALUES ('$id','$name', '$price', '$image')");
    } else {
      echo "Sorry, there was an error uploading your file.";
      // header('Location: ../admin/courses.php');
    }
  }
}
if(isset($_POST['update']))
{
    $id = $_POST['p_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $old_image = $_POST['thumbnail_old'];
    $new_image = $_FILES['thumbnail']['name'];
    $target_dir = "../images/";
    $target_file = "$target_dir".basename($_FILES["thumbnail"]["name"]);
    if($new_image!='')
    {
        $update_filename ="./images/".$_FILES['thumbnail']['name'];
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
        $query = "UPDATE drinks SET  d_name='$name', d_price='$price', d_image='$update_filename' WHERE d_id='$id'";
        $query_run= mysqli_query($db_conn,$query);
        if($query_run)
        {
            if($new_image!=''){
                move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
                unlink("../images/".$old_image);
            }
            header('Location: drinks.php');
        }
        else{

        }
    } 
    
}
if (isset($_POST['delete'])) {
    // Get the ID of the record to delete (replace 'record_id' with the actual name of your record ID field)
    $recordId = $_POST['delete_id'];
    $sql = "DELETE FROM drinks WHERE d_id = '$recordId'";

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
                         EDIT Drinks</h3>
                     </div>
                     <div class="card-body">
                        <?php
                        if(isset($_GET['id'])){
                            $d_id = $_GET['id'];
                            $q= "SELECT * FROM drinks WHERE d_id='$d_id'";
                            $q_run = mysqli_query($db_conn,$q);
                            if(mysqli_num_rows($q_run)>0)
                            { 
                                foreach($q_run as $drinks)
                                {
                                ?>      
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                    <input type="hidden" name="p_id" value="<?=$drinks['d_id']?>">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Drink Name</label>
                                        <input type="text" name="name" value="<?= $drinks['d_name']?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" value="<?= $drinks['d_price']?>" id="price" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control mb-3" type="file" name="thumbnail" id="thumbnail">
                                        <input type="hidden" name="thumbnail_old" value="<?php echo $drinks['d_image']?>">
                                        <img  src=".<?=$drinks['d_image']?>" alt="" height="100">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <button name="update" class="btn btn-success">Update  Drink</button>
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
                            Drink
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
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                    $count=1;
                                    $drinksdetail = get_drinks();  
                                    while($drinks= mysqli_fetch_object($drinksdetail)){?>
                                    <tr>
                                        <td><?=$count++?></td>
                                        <td><img src=".<?=$drinks->d_image?>" alt="" height="100"></td>
                                        <td><?=$drinks->d_name?></td>
                                        <td><?=$drinks->d_price?></td>
                                        <td class='d-flex gap-2'>
                                            <a class="btn btn-success" href="?id=<?=$drinks->d_id?>">Edit</a>
                                            <form method="post" style="display: inline;">
                                                <input type="hidden" name="delete_id" value="<?= $drinks->d_id ?>">
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
                            Add New Drink
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
<?php include('includes/footer.php') ?>