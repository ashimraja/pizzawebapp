<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
     <!-- Bootstrap core CSS -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
         <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <section class="bg-light vh-100 d-flex">
        <div class=" m-auto" style="width:320px;">
        <div class="card">
            <div class="card-body">
            <div class="border rounded-circle mx-auto d-flex " style="width:100px;height:100px" ><i class="fa fa-user text-light fa-3x m-auto"></i></div>
            <form action="../actions/login.php" method="POST">
                <!-- Material input -->
                    <div class="md-form">
                    <input type="text" id="email" name="email" class="form-control">
                    <label for="email">Your Email</label>
                    </div>
                    <!-- Material input -->
                    <div class="md-form">
                    <input type="password" id="password" name="password" class="form-control">
                    <label for="password">Your Password</label>
                    </div>
                <div class="text-center">
                <button class="btn btn-warning" name="login">Login</button>
                </div>
            </form>
            
            </div>
        </div>
        </div>
    </section>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>
</html>