<div class="pizzaDetails-outer">
    <div class="pizzaDetails-inner">
        <i class="bi bi-x-lg" style="font-size: 25px; cursor: pointer; position: absolute; top: 10px; right: 20px" onclick="closeDescription()"></i>
        <div class="pizza-description">
            <div class="left-section" style="flex: 1 1; display: flex; align-items: center; justify-content: center">
                <img id="pizzaDetailImage" src="">
            </div>
            <div class="right-section" style="flex: 1 1; padding: 20px 50px;">
                <h2 id="pizzaDetailName"></h2>
                <p style="margin-bottom: 20px"><span style="font-size: 15px;" id="type"></span></p>
                <h4 style="color: var(--primary); margin-bottom: 20px" id="pizzaDetailPrice"></h4>
                <button class="order-button" id="addToCartButton"><i class="bi bi-cart-plus" style="margin-right: 10px"></i>Add to Cart</button>
                <h6 style="margin: 30px 0 15px 0; font-family: 'salsa';color: var(--dark);">Reviews</span></h6>
                <div class="reviews" style="min-width: 450px; max-width: 450px; max-height: 200px; min-height: 200px; overflow-y: scroll; position: relative">
                    <div id="reviews" style="min-height:100%;">
                    </div>
                    <!-- <div class="review-item">
                        <p class="username"><img src="" style="height: 40px; width: 40px; border-radius: 50%; border: solid 1px"></img> Ashim Raja</p><i class="date">Mar 23</i>
                        <p style="margin: 0 0 0 45px">Nice!</p>
                    </div>
                    <div class="review-item">
                        <p class="username"><img src="" style="height: 40px; width: 40px; border-radius: 50%; border: solid 1px"></img> Rashok Katwal</p><i class="date">Jan 01</i>
                        <p style="margin: 0 0 0 45px">Great Taste!</p>
                    </div>
                    <div class="review-item">
                        <p class="username"><img src="" style="height: 40px; width: 40px; border-radius: 50%; border: solid 1px"></img> Rashok Katwal</p><i class="date">Jan 01</i>
                        <p style="margin: 0 0 0 45px">Great Taste!</p>
                    </div> -->
                    <button class="order-button" style="margin-top: 5px; height: 40px; width: 40px; border-radius: 50%; border: none; background: var(--primary); color: white; padding: 0; position: sticky; bottom: 0px; left: 90%;display: flex; align-items: center; justify-content: center;" id="add-review"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="addReview-outer">
    <div class="addReview">
        <i class="bi bi-x-lg" style="font-size: 25px; cursor: pointer; position: absolute; top: 10px; right: 20px" onclick="closeReview()"></i>
        <h5 style="font-family: 'salsa';color: #4F320C;">Add <span style="color: var(--primary)">Review</span></h5>
        <div class="review-username" >
            <img src="./images/users/<?php echo $_SESSION['profile_pic'];?>" style="height: 50px; width: 50px; border-radius: 50%; border: solid 1px;"></img>
            <span><?php if(isset($_SESSION['firstname'])){echo $_SESSION['firstname']." ".$_SESSION['lastname'];}?></span>
        </div>
        <div class="form">
            <h6>Write a Review</h6><br>
            <textarea maxlength="150" id="review"></textarea><br><br>
            <div style="display: flex; align-items: center; justify-content: end;"><button class="order-button" id="post-review">Post</button></div>
        </div>
    </div>
</div>
