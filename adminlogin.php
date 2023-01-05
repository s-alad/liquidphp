<?php require_once("connection.php"); 
 ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Sign In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css3/stylee.css">
</head>
<body>
<nav>
      <a href="index.php"><img style="height: 90px;" class="logo" src="assets/img/logo/li4.jpg"></a>
    </nav>
    <div class="main">
	<section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/img/service/admin-signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                      <h2 class="form-title"><?php display_message(); ?></h2>
                        <h2 class="form-title">Admin Sign In</h2>
                        <form method="POST" class="register-form" id="login-form" >
                            <?php login_user(); ?>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="admin_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="admin_password" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
		<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="portfolio/js2/mainn.js"></script>
</body>
</html>