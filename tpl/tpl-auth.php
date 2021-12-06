<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fonts/bootstrap-icons/bootstrap-icons.css">
    <link rel="shortcut icon" href="assets/img/profile.png" type="image/x-icon">
    <title>SpeedTodo - Todo Manager</title>
</head>

<body>
    <div class="container">
        <div class="col-12 mt-5">
            <div class="box w-100">
                <div class="custom-nav">
                    <div class="title text-white">SpeedTodo</div>
                    <div class="user">
                        <span class="username float-end">Register / Login</span>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 side">
                            <div class="tasks-title">Register</div>
                            <div class="col-6 mx-auto  register">
                                <form action="<?= siteUrl('auth.php?action=register') ?>" method="post">
                                    <input type="text" name="name" placeholder="name" class="form-control my-4">
                                    <input type="email" name="email" placeholder="email" class="form-control mb-4">
                                    <input type="password" name="password" placeholder="password" class="form-control mb-4">
                                    <button type="submit" name="btn" class="btn btn-primary btn-sm">Register</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="tasks-title">Login</div>
                            <div class="col-6 mx-auto">
                                <form action="<?= siteUrl('auth.php?action=login') ?>" method="post">
                                    <input type="email" name="email" placeholder="email" class="form-control my-4">
                                    <input type="password" name="password" placeholder="password" class="form-control mb-4">
                                    <button type="submit" name="btn" class="btn btn-primary btn-sm">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>