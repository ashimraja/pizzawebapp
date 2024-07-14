$(document).ready(function() {

    var active = "pizza";
    var slide = 'on';

    $('.drinks-list-grid').fadeOut(0);

    $('#show-pizza-button').click(function() {
        if (active == "drinks") {
            $('#show-pizza-button').addClass('active-nav');
            $('#show-drinks-button').removeClass('active-nav');
            $('.drinks-list-grid').fadeOut(0);
            $('.pizza-list-grid').fadeIn(500);
            active = "pizza";
        }
    })

    $('#show-drinks-button').click(function() {
        if (active == "pizza") {
            $('#show-drinks-button').addClass('active-nav');
            $('#show-pizza-button').removeClass('active-nav');
            $('.pizza-list-grid').fadeOut(0);
            $('.drinks-list-grid').fadeIn(500);
            active = "drinks";
        }
    })

    $('#outer-box').click(function() {
        console.log('clicked');
        $('#first-rotator').toggleClass('first-rotator');
        $('#second-rotator').toggleClass('second-rotator');
        $('#invisible').toggleClass('invisible');
        if (slide == 'on') {
            $('#navigation-slide').css({"right": "0"});
            slide = 'off';
        }
        else {
            $('#navigation-slide').css({"right": "-100%"});
            slide = 'on';
        }
    })

    // $('.grid-element').each(function() {
    //     $(this).attr('href', 'item-detail.php');
    // })

    if (document.documentElement.scrollTop == 0) {
        $('#hero-h1').addClass('slideUp');
        $('#hero-p').addClass('slideUp');
        $('#hero-button').addClass('slideUp');
        $('.hero-right').addClass('slideUp');
    }

    $("#add-review").click(function() {
        if(sessionStatus == "active") {
            openReview();
        }
        else {
            window.location.href = "sign-in.php";
        }
    });

    $('#checkout').click(async function() {
        if(sessionStatus != "active") {
            window.location.href = "sign-in.php";
        }
        else {
            if(!cart.length == 0) {
                let res = await $.post('/brotherspizza/order.php', {cart: JSON.stringify(cart)});
                alert(res);
            }
        }
    });

    $('#showProfile').click(function() {
        openProfile();
    });
    
})

window.onscroll = function() {myFunction()};

function myFunction() {
    if (document.documentElement.scrollTop > 0) {
        $('.navigation-outer').css({"top": "0", "background": "var(--light)", "box-shadow": "0 5px 5px rgba(0, 0, 0, 0.1)"});
    }
    else if (document.documentElement.scrollTop == 0){
        $('.navigation-outer').css({"top": "-100px", "background": "transparent", "box-shadow": "none"});
    }
}

var itemDetails = null;

var reviews = null;

var orders = null;

let reviewOpen = false;

async function fetchReviews(id) {
    return await $.ajax({
        type: "POST",
        url: 'getReview.php',
        dataType: 'json',
        data: {itemid: id},
        success: function(data) {
            return data;
          }
    });
}

async function fetchItemDetails(id) {
    return await $.ajax({
        type: "POST",
        url: 'getDetails.php',
        dataType: 'json',
        data: {id: id},
        success: function(data) {
            return data;
          }
    });
}

async function fetchOrders() {
    return await $.ajax({
        type: "GET",
        url: 'getOrders.php',
        dataType: 'json',
        data: {},
        success: function(data) {
            return data;
          }
    });
}

function formatDate(date) {
    var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
    var d = new Date(date);
    return monthNames[d.getMonth()] + ' ' + d.getDate()
}

function writeReviews() {
    let code = "";
    for (let i = 0; i < reviews.length; i++) {
        code += `<div class='review-item'><p class='username'><img src='./images/users/${reviews[i].profile_pic}' style='height: 40px; width: 40px; border-radius: 50%;'></img> ${reviews[i].name}</p><i class='date'>${formatDate(reviews[i].date)}</i><p style='margin: 0 0 0 45px'>${reviews[i].review}</p></div>`;
    };
    return code;
}

function writeOrders() {
    let code = "";
    for(let i = 0; i < orders.length; i++) { 
        if(orders[i].order_status != 'delivered') {
            code += `<div class="order-item">
                    <img src="${orders[i].item.image}">
                    <div class="order-detail">
                        <h5>${orders[i].item.name}</h5>
                        <span style="color: var(--secondary)">₹${orders[i].item.price}</span><br>
                        <span style="font-size: 13px">Qty ${orders[i].qty}</span>
                    </div>
                    <button class="order-button" onclick="cancelOrder('${orders[i].order_id}')">Cancel</button>
                </div>`;
        }
        else {
            code += `<div class="order-item">
                    <img src="${orders[i].item.image}">
                    <div class="order-detail">
                        <h5>${orders[i].item.name}</h5>
                        <span style="color: var(--secondary)">₹${orders[i].item.price}</span><br>
                        <span style="font-size: 13px">Qty ${orders[i].qty}</span>
                    </div>
                    <i>Delivered</i>
                </div>`;
        }
        
    }
    return code;
}

async function openDescription(id) {
    itemDetails = await fetchItemDetails(id);
    reviews = await fetchReviews(id);
    $('#pizzaDetailImage').attr("src", itemDetails.image);
    $('#pizzaDetailName').html(itemDetails.name);
    $('#pizzaDetailPrice').html("₹" + itemDetails.price);
    $('#type').html(itemDetails.type);
    if(cart.find(obj => obj.id === id) == undefined) {
        $('#addToCartButton').attr("onclick", `addToCart('${id}')`);
        $("#addToCartButton").html("<i class='bi bi-cart-plus' style='margin-right: 10px'></i>Add to Cart");
    }
    else if(cart.find(obj => obj.id === id) != undefined){
        $('#addToCartButton').attr("onclick", `removeFromCart('${id}')`);
        $("#addToCartButton").html("<i class='bi bi-trash3' style='margin-right: 10px'></i>Remove from Cart");
    }
    if(itemDetails.type == "Non Veg") {
        $('#type').css({'color': 'var(--secondary)'});
        $('#addToCartButton').css({'background-color': 'var(--secondary)'});
    }
    else if(itemDetails.type == "Veg"){
        $('#type').css({'color': 'green'});
        $('#addToCartButton').css({'background-color': 'green'});
    }
    else {
        $('#addToCartButton').css({'background-color': 'var(--primary)'});
    };
    // alert(reviews);
    if(reviews.length > 0) {
        $('#reviews').html(writeReviews());
    }
    else {
        $('#reviews').html("<h6>No Reviews Yet</h6>");
    }
    $('#post-review').attr("onclick", `postReview('${id}')`);
    $('.pizzaDetails-outer').css('display', 'flex');
    $(document).on('keydown', function(event) {
        if (event.key == "Escape") {
            if(reviewOpen != true) {
                closeDescription();
            }
        }
    });
}

function closeDescription() {
    itemDetails = null;
    $('.pizzaDetails-outer').css('display', 'none');
    reviewOpen = false;
    $('#reviews').html("");
}

function openReview() {
    $('.addReview-outer').css('display', 'block');
    reviewOpen = true;
    $(document).on('keydown', function(event) {
        if (event.key == "Escape") {
            if (reviewOpen == true) {
                closeReview();
            }  
        }
    });
}

function closeReview() {
    $('.addReview-outer').css('display', 'none');
    reviewOpen = false;
}

async function postReview(id) {
    let review = $("#review").val();
    if(review) {
        let res = await $.post('/brotherspizza/addReview.php', {itemid: id, review: review});
        alert(res);
        closeReview();
        openDescription(id);
    }
}

async function openProfile() {
    if(sessionStatus == "active") {
        orders = await fetchOrders();
        $('.order-list').html(writeOrders());
        $('.profile-outer').css('display', 'flex');
        $(document).on('keydown', function(event) {
            if (event.key == "Escape") {
                closeProfile();
            }
        });
    }
    else {
        window.location.href = "sign-in.php";
    }
}

function closeProfile() {
    $('.order-list').html("");
    $('.profile-outer').css('display', 'none');
}

async function cancelOrder(id) {
    await $.ajax({
        type: "POST",
        url: 'cancelOrder.php',
        dataType: 'json',
        data: {order_id: id},
        success: function(data) {
            if(data) {
                alert("Order Cancelled");
                closeProfile();
                openProfile();
            }
            else {
                alert("Order couldn't be cancelled");
                closeProfile();
                openProfile();
            }
          }
    });
}

function openEditProfile() {
    $('.editProfile-outer').css('display', 'flex');
}

async function changeProfilePicture() {
    var formData = new FormData($("#upload-pp")[0]);
    console.log(formData["profile_pic"]);
    await $.ajax({
        type: "POST",
        url: 'uploadProfilePic.php',
        // dataType: 'json',
        mimeType: "multipart/form-data",
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function(data) {
            alert(data);
          }
    });
    location.reload();
}