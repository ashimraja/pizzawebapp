		<!-- Cart section -->
        <div class="cart-outer">
            <div class="cart-head">
                <h3 class="cart-head">Your <span style="color: var(--primary)">Cart</span></h3>
                <i class="bi bi-x-lg" style="font-size: 25px; cursor: pointer" onclick="closeCart()"></i>
            </div>
            
            <div class="cart-inner">
            
                <!-- <div class="cart-details">
                    <div class="cart-list">
                        <div class="cart-list-item">
                            <div class="left-section">
                                <img src="./images/spicy-tandoori-paneer-pizza.jpeg" height="100px" width="100px">
                            </div>
                            <div class="right-section">
                                <h4>Spicy Tandoori Paneer Pizza</h4>
                                <h5 style="color: var(--secondary)">₹480</h5>
                                <div class="bottom-section">
                                    <div>
                                        <span> </span><span class="inc-dec-button">-</span><span><input type="number" value="1"></span><span class="inc-dec-button">+</span>
                                    </div>
                                    <button>Remove Item</button>
                                </div>
                            </div>
                        </div>
                        <div class="cart-list-item">
                            <div class="left-section">
                                <img src="./images/spicy-tandoori-paneer-pizza.jpeg" height="100px" width="100px">
                            </div>
                            <div class="right-section">
                                <h4>Spicy Tandoori Paneer Pizza</h4>
                                <h5 style="color: var(--secondary)">₹480</h5>
                                <div class="bottom-section">
                                    <div>
                                        <span> </span><span class="inc-dec-button">-</span><span><input type="number" value="1"></span><span class="inc-dec-button">+</span>
                                    </div>
                                    <button>Remove Item</button>
                                </div>
                            </div>
                        </div>
                        <div class="cart-list-item">
                            <div class="left-section">
                                <img src="./images/spicy-tandoori-paneer-pizza.jpeg" height="100px" width="100px">
                            </div>
                            <div class="right-section">
                                <h4>Spicy Tandoori Paneer Pizza</h4>
                                <h5 style="color: var(--secondary)">₹480</h5>
                                <div class="bottom-section">
                                    <div>
                                        <span> </span><span class="inc-dec-button">-</span><span><input type="number" value="1"></span><span class="inc-dec-button">+</span>
                                    </div>
                                    <button>Remove Item</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-total">
                        <h4 style="font-family: 'salsa';color: #4F320C; margin-bottom: 50px">Summary</h4>
                        <div style="display: flex; align-items: center; justify-content: space-between;border-bottom: solid 1px rgba(0, 0, 0, 0.3)">
                            <p style="font-size: 20px;">Grand Total </p>
                            <p style="color: var(--primary);font-size: 20px;">₹480</p>
                        </div>
                        <button class="order-button" style="margin-top: 20px; width: 100%">Checkout</button>
                    </div>
                </div> -->
                <div class="cart-list" id="cart-list">

                    <!-- <div class="cart-item">
                        <div>
                            <img src="./images/spicy-mushroom-peppers-pizza.jpeg" height="100px" width="100px">
                        </div>
                        <div style="min-width: 100%; display: inline-flex;">
                            <div style="display: flex; min-width: fit-content; flex: 1 1; align-items: center; justify-content: space-around">
                                <h5 style="flex: 1 1">Spicy Mushroom Peppers Pizza</h5>
                                <h5 style="color: var(--secondary);flex: 1 1; text-align: center">₹190</h5>
                            </div>
                            <div style="min-width: fit-content; display: flex; align-items: center; justify-content: space-around; flex: 1 1">
                                <h5 style="color: var(--secondary); flex: 1 1 1">Total: ₹190</h5>
                                <input type="number" value="1" style="flex: 1 1 1">
                                <button style="flex: 1 1 1">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="cart-item">
                        <img src="./images/spicy-mushroom-peppers-pizza.jpeg" height="100px" width="100px">
                        <h5>Spicy Mushroom Peppers Pizza</h5>
                        <h5 style="color: var(--secondary)">₹190</h5>
                        <input type="number" value="1">
                        <button>
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div> -->
                    <!-- <div class='empty-cart'>
                        <h4>Your Cart is Empty</h4>
                    </div> -->
                    
                </div>
                <div class="list-detail">
                    <h6 style="margin-bottom: 15px;padding-bottom: 15px; border-bottom: solid 1px rgba(0,0,0,0.1);font-weight: 600">Cart Total</h6>
                    <div style="display: flex;justify-content: space-between;">
                        <p>Total</p>
                        <p id="total-price" style="color: var(--secondary); font-weight: 600">0</p>
                    </div>
                    <button class="order-button" id="checkout">Order</button>
                </div>
            </div>
        </div>

        <?php
        //session_start();
    
    
        if (isset($_SESSION['id'])) {
            $sql = "select * from cart where u_id = '".$_SESSION['uid']."'";
            $result = $connresult->query($sql);
        }
        ?>

        <script>
            var tempCart = [
                <?php 
                    if (isset($_SESSION['id'])) {
                        while($row=$result->fetch_assoc()) {
                            //echo $row["type"];
                            if ($row['i_type'] == "pizza") {
                                $sql = "select * from pizza where p_id = '".$row['i_id']."'";
                                $items = $connresult->query($sql);
                                while($row1=$items->fetch_assoc()) {
                                    echo "{id: '".$row1['p_id']."',name: '".$row1['p_name']."',pizza_type: '".$row1['p_type']."', price: ".$row1['p_price'].", image: '".$row1['p_image']."', qty: '".$row['qty']."', type: '".$row['i_type']."'},";
                                }
                            }
                            else if ($row['i_type'] == "drink") {
                                $sql = "select * from drinks where d_id = '".$row['i_id']."'";
                                $items = $connresult->query($sql);
                                while($row1=$items->fetch_assoc()) {
                                    echo "{id: '".$row1['d_id']."',name: '".$row1['d_name']."', price: ".$row1['d_price'].", image: '".$row1['d_image']."', qty: '".$row['qty']."', type: '".$row['i_type']."'},";
                                }
                            }
                        }
                    }    
                ?>
            ]
            cart = tempCart;
            
        </script>
