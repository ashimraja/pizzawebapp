<?php include('includes/config.php') ?>
<?php include('includes/header.php') ?>
<?php include('includes/sidebar.php');
$totalUsers = getTotalUsers();
$totalPizza = getTotalPizza();
$totalDrinks = getTotalDrinks();
$totalOrders = getTotalOrders();
$completedOrders = getCompletedOrders();
?>
<style>
.order-card {
    color: #fff;
}
.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>
<main class='p-5'>
    <div class="row">
        <!-- First Card: Total Users -->
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Orders Received</h6>
                    <h2 class="text-right"><span><?= $totalOrders ?></span></h2>
                    <p class="m-b-0">Completed Orders<span class="f-right"><?= $completedOrders?></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Users</h6>
                    <h2 class="text-right"></i><span> <?= $totalUsers ?></span></h2>
                    <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Number of Pizza</h6>
                    <h2 class="text-right"><span> <?= $totalPizza ?></span></h2>
                    <p class="m-b-0">Completed Orders<span class="f-right">34</span></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Number of Drinks</h6>
                    <h2 class="text-right"></i><span> <?= $totalDrinks ?></span></h2>
                    <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                </div>
            </div>
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
                                            </tr>
                                        <?php } }?>
                                        
                                </tbody>
                            </table>
                                        </div>
                                        </div>

</main>
<?php include('includes/footer.php') ?>
