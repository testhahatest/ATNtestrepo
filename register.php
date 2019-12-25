<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
<?php
require('connect.php');
?>
<div class="container">
    <div class="row text-center">
        <h2> Register An Account </h2>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center thongbaoloi">
            <?php
                if(isset($_POST['submit'])) {
                    if(empty($_POST['username']) or empty($_POST['password'])){
                        echo '<p style="color:red">Please dont leave anything empty!</p>';
                    } else {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $password2 = $_POST['password2'];
                        
                        if($password2 != $password){
                            echo '<p style="color:red">Password Does Not Match!</p>';
                        } else {
                            $sql ="select * from agency where AUser='$username'";
                            $query = mysqli_query($con, $sql);
                            //$num = mysqli_num_rows($query);
                            $num = 1;
                            if ($num == 0) {

                                $sql2 = "INSERT INTO agency(AUser,APass) VALUES ('$username','$password')";
                                $them = mysqli_query($con, $sql2);
                                if($them){
                                    echo '<p style="color:green">Account Creatation Successful!</p>';
                                } else {
                                    echo '<p style="color:red">Account Creation Successful!</p>';
                                }                                  
                            } else {
                                echo '<p style="color:red">Account Already Exist!</p>';
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="" method="POST" role="form">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" id="" placeholder="Username">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" id="" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="">Confirm password</label>
                    <input type="password" name="password2" class="form-control" id="" placeholder="Confirm password">
                </div>

                <button type="submit" name="submit" class="btn btn-md btn-block btn-danger-gradiant border-0"> Create Account</button>
            </form>
            <a class="btn bg-white text-danger rounded-pill btn-md mt-3" href="index.php"><span>Log In </span></a>
        </div>
    </div>
</div>
</body>
</html>