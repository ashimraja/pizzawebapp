<div class="navigation-outer">
    <div class="navigation-inner">
        <div class="navigation-logo">
            <img src="./images/brand.png" width="70px">
        </div>
        <div class="navigation-items">
            <ul>
                <a href="index.php"><li class="index">Home</li></a>
                <a href="about.php"><li class="about">About Us</li></a>
                <a href="menu.php"><li class="menu">Menu</li></a>
                <a href="contact.php"><li class="contact">Contact Us</li></a>
                <a class="order-button sign-in" href="sign-in.php"><li>Sign In</li></a>
            </ul>
            <a style="margin-right: 20px; z-index: 99999;color: #000; font-size: 22px; cursor: pointer" id="showProfile">
                <i class="bi bi-person"></i>
            </a>
            <a id="cart" style="margin-right: 20px; z-index: 99999;text-decoration: none; position: relative;color: #000; font-size: 22px">
                <div id="cart-notification"></div>
                <i class="bi bi-cart"></i>
            </a>
            <div class="menu-animation" id="outer-box">
                <span class="menu-lines" id="first-rotator"></span>
                <span class="menu-lines" id="invisible"></span>
                <span class="menu-lines" id="second-rotator"></span>
            </div>

            <div class="navigation-slide" id="navigation-slide">
                <a class="index" href="index.php"><i class="bi bi-house" style="font-size: 20px; margin-right: 10px; color: var(--secondary)"></i>Home</a>
                <a class="about" href="about.php"><i class="bi bi-people" style="font-size: 20px; margin-right: 10px; color: var(--secondary)"></i>About Us</a>
                <a class="menu" href="menu.php"><i class="bi bi-cup-straw" style="font-size: 20px; margin-right: 10px; color: var(--secondary)"></i>Menu</a>
                <a class="contact" href="contact.php"><i class="bi bi-telephone" style="font-size: 20px; margin-right: 10px; color: var(--secondary)"></i>Contact Us</a>
                <a class="order-button sign-in" href="sign-in.php">Sign In <i class="bi bi-box-arrow-in-right"></i></a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/')+1).slice(0, -4);
        $(`.${filename}`).addClass('active');
    });
    
    
    const sessionStatus = '<?php if(!isset($_SESSION['id'])) echo 'inactive'; else echo 'active';?>';
    const userType = '<?php if(isset($_SESSION['id'])) echo $_SESSION['post'];?>';

    if (sessionStatus == 'active' && userType == 'client') {
        $('.sign-in').html('Logout');
        $('.sign-in').attr('href', 'logout.php');
    }
    else if(sessionStatus == 'active' && userType == 'admin') {
        $('.sign-in').html('Dashboard');
        $('.sign-in').attr('href', './admin/dashboard.php');
    }
    
</script>