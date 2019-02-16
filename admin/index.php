<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ĐĂNG NHẬP CHƯƠNG TRÌNH QUẢN LÝ THƯ VIỆN TRƯỜNG THPT ABC</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

<style>
.blink_text {
-webkit-animation-name: blinker;
-webkit-animation-duration: 1s;
-webkit-animation-timing-function: linear;
-webkit-animation-iteration-count: infinite;

-moz-animation-name: blinker;
-moz-animation-duration: 1s;
-moz-animation-timing-function: linear;
-moz-animation-iteration-count: infinite;

 animation-name: blinker;
 animation-duration: 1s;
 animation-timing-function: linear;
 animation-iteration-count: infinite;

 color:white;
 font-size:16px;
}

@-moz-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@-webkit-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }
</style>
</head>

<body style="background:#F7F7F7;">
    
    <div class="">

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form action="" method="post">
                        <h1>ĐĂNG NHẬP</h1>
                        <div>
                            <input type="text" class="form-control" name="username" placeholder="Tài khoản" autofocus='autofocus' required />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required />
                        </div>
                        <div>
								<button class="btn btn-primary submit" type="submit" name="login"><i class="fa fa-check"></i> ĐĂNG NHẬP</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
						
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-university" style="font-size: 26px;"></i>QUẢN LÝ THƯ VIỆN TRƯỜNG THPT ABC</h1>

                                <p>© <?php echo date('Y'); ?> <i class="fa fa-book"></i> HỆ THỐNG QUẢN LÝ THƯ VIỆN</p>
                            </div>
                        </div>
                    </form>
<?php
include('include/dbcon.php');

//$con=mysqli_connect("localhost","root","0562324","lms");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else { echo "ket noi thanh cong ";}

// Perform queries




if (isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

//$login_query = mysqli_query("select * from admin where username='$username' and password='$password'");
$login_query = mysqli_query($con,"select * from admin where username='$username' and password='$password'",MYSQLI_STORE_RESULT);
$count= mysqli_num_rows($login_query);
$row= mysqli_fetch_array($login_query);

if ($count > 0){
session_start();
$_SESSION['id']=$row['admin_id'];

echo "<script>window.location='home.php'</script>";
}else{ ?>
<div class="alert alert-danger"><h4 class="blink_text">Truy Cập Bị Từ Chối, Kiểm Tra thông tin đăng nhập</h4></div>
    <!--  <div class="alert alert-danger"><h3 class="blink_text">Access Denied</h3></div>  -->
    <?php
}
}
?>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>