<?php include('includes/config.php') ?>
<?php include('includes/header.php') ?>
<?php include('includes/sidebar.php') ?>
<?php

if (isset($_POST['delete'])) {
    // Get the ID of the record to delete (replace 'record_id' with the actual name of your record ID field)
    $recordId = $_POST['delete_id'];
    $sql = "DELETE FROM orders WHERE order_id = $recordId";

    mysqli_query($db_conn, $sql);
    // Call the deleteRecord function with the record ID
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
        $query = "UPDATE orders SET  order_status='delivered'  WHERE order_id='$id'";
        $query_run= mysqli_query($db_conn,$query);
        if($query_run)
        {
            header('Location: order.php');
        }
}
?>
<main>
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
            <div >
                <div class="card">
                    <div class="card-header py-2">
                        <h2 class="card-title">
                            Orders
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
                                    <th>Item name</th>
                                    <th>Item Type</th>
                                    <th>User Id</th>
                                    <th>Order's Person</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                    $count=1;
                                    $getToDeliver = getToDeliver();  
                                    while($items= mysqli_fetch_object($getToDeliver)){
                                        $user=getaUser($items->user_id);
                                        $item=getItem($items->item_id, $items->item_type);
                                        if ($items->item_type == "pizza") { ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $item->p_name ?></td>
                                                <td><?= $items->item_type ?></td>
                                                <td><?= $items->user_id ?></td>
                                                <td><?= $user->firstname ?></td>
                                                <td><?= $item->p_price ?></td>
                                                <td><?= $items->qty ?></td>
                                                <td><?= $items->order_status ?></td>
                                                <td>
                                                    <a class="btn btn-success" href="?id=<?=$items->order_id?>">Delivered</a>
                                                    <form method="post" style="display: inline;">
                                                        <input type="hidden" name="delete_id" value="<?= $items->order_id ?>">
                                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $item->d_name ?></td>
                                                <td><?= $items->item_type ?></td>
                                                <td><?= $items->user_id ?></td>
                                                <td><?= $user->firstname ?></td>
                                                <td><?= $item->d_price ?></td>
                                                <td><?= $items->qty ?></td>
                                                <td><?= $items->order_status ?></td>
                                                <td>
                                                <a class="btn btn-success" href="?id=<?=$items->order_id?>">Delivered</a>
                                                    <form method="post" style="display: inline;">
                                                        <input type="hidden" name="delete_id" value="<?= $items->order_id ?>">
                                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } }?>
                                        
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive ">
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Item name</th>
                                    <th>Item Type</th>
                                    <th>User Id</th>
                                    <th>Order's Person</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                    $count=1;
                                    $getDelivered = getDelivered();  
                                    while($items= mysqli_fetch_object($getDelivered)){
                                        $user=getaUser($items->user_id);
                                        $item=getItem($items->item_id,$items->item_type);
                                        if ($items->item_type == "pizza") { ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $item->p_name ?></td>
                                                <td><?= $items->item_type ?></td>
                                                <td><?= $items->user_id ?></td>
                                                <td><?= $user->firstname ?></td>
                                                <td><?= $item->p_price ?></td>
                                                <td><?= $items->qty ?></td>
                                                <td><?= $items->order_status ?></td>
                                                <td>
                                                    <form method="post" style="display: inline;">
                                                        <input type="hidden" name="delete_id" value="<?= $items->order_id ?>">
                                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $item->d_name ?></td>
                                                <td><?= $items->item_type ?></td>
                                                <td><?= $items->user_id ?></td>
                                                <td><?= $user->firstname ?></td>
                                                <td><?= $item->d_price ?></td>
                                                <td><?= $items->qty ?></td>
                                                <td><?= $items->status ?></td>
                                                <td>
                                                    <form method="post" style="display: inline;">
                                                        <input type="hidden" name="delete_id" value="<?= $items->order_id ?>">
                                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php }} ?>
                                        
                                </tbody>
                        </table>
                        </div>
                    </div>    
                </div>
            </div>
            </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
</main>
<?php include('includes/footer.php') ?>