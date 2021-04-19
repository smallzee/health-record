<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2/9/21
 * Time: 9:00 AM
 */

require_once '../config/core.php';

if (is_doc_login()){
    redirect(base_url('user/dashboard.php'));
    return;
}

if (isset($_POST['login'])){
    $username = $_POST['email'];
    $password = $_POST['password'];


    $sql = $db->query("SELECT * FROM users WHERE email='$username' and password='$password'");
    $rs = $sql->fetch(PDO::FETCH_ASSOC);

    if ($sql->rowCount() == 0){
        set_flash("Invalid login details entered","danger");
    }else{
        $rs['password'] = 'xxx';
        $_SESSION['is_loggedin'] = true;
        $_SESSION[DOCTOR_SESSION_HOLDER] = $rs;
        redirect(base_url('user/dashboard.php'));
    }
}

?>
<!Doctype html>
<html>
<head>
    <meta property="og:locale" content="en_US">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= base_url('templates/css/app.css')?>">
    <link rel="stylesheet" href="<?= base_url('templates/css/login5-style.css') ?>">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="authfy-container col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
            <div class="col-sm-5 d-none d-sm-block authfy-panel-left">
                <div class="brand-col">
                    <div class="headline">
                        <!-- brand-logo start -->
                        <div class="brand-logo">
                            <img src="<?= image_url('icon.jpeg') ?>" style="border-radius: 50%;" width="150" alt="brand-logo">
                        </div><!-- ./brand-logo -->
                    </div>
                </div>
            </div>
            <div class="col-sm-7 authfy-panel-right">
                <!-- authfy-login start -->
                <div class="authfy-login">
                    <!-- panel-login start -->
                    <div class="authfy-panel panel-login text-center active">
                        <div class="authfy-heading">
                            <h3 class="auth-title">Doctor Login </h3>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <?php flash(); ?>
                                <form class="loginForm" method="post">
                                    <div class="form-group">
                                        <input type="email" required class="form-control email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <div class="pwdMask">
                                            <input type="password" required class="form-control password" name="password" placeholder="Password">
                                            <span class="fa fa-eye-slash pwd-toggle"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- ./panel-login -->
                    <!-- panel-forget start -->
                    <div class="authfy-panel panel-forgot">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="authfy-heading">
                                    <h3 class="auth-title">Recover your password</h3>
                                    <p>Fill in your e-mail address below and we will send you an email with further instructions.</p>
                                </div>
                                <form class="forgetForm" method="post">
                                    <div class="form-group">
                                        <input type="email" required class="form-control" name="username" placeholder="Email address">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Recover your password</button>
                                    </div>
                                    <div class="form-group">
                                        <a class="lnk-toggler" data-panel=".panel-login" href="#">Already have an account?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- ./panel-forgot -->
                </div> <!-- ./authfy-login -->
            </div>
        </div>
    </div> <!-- ./row -->
</div> <!-- ./container -->

<script src="<?= base_url('templates/js/custom.js') ?>"></script>
</body>
</html>
