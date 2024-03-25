<?php
session_start();
$page_title = "Admin login";
include('includes/header.php'); 
include('includes/dbconfig.php');
?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Staff Login</h1>
                                    <?php
                                        // Display login error message if exists
                                        if (isset($login_error)) {
                                            echo '<div class="alert alert-danger" role="alert">' . $login_error . '</div>';
                                        }
                                    ?>
                                </div>
                                <form class="user" action="process_login.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user" placeholder="Enter username...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block"> Login </button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
