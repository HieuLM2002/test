
<?php
session_start();
require_once ('../database/connect.php');
$conn = mysqli_connect('localhost','root','','shop_quanao');

$err = [];
if (isset($_POST['login'])){
    $username = addslashes($_POST['tendangnhap']);
    $password = addslashes($_POST['matkhau']);

    $sql  = "SELECT *FROM tbl_dangky WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $check_username = mysqli_num_rows($result);
    $err = [];
    if (empty($username)){
        $err['tendangnhap'] = "Please enter username";
    }
    if (empty($password)){
        $err['matkhau'] = "Please enter password";
    }
    if ($check_username == 1){
        $check_password = password_verify($password,$row['password']);

        if (isset($check_password) && $check_password == true){
            $_SESSION['name'] = $row['name_client'];
            $_SESSION['username'] = $row['username'];
            echo '<script>
            alert("Đăng nhap hành công!"); 
            window.location = "../giaodien/index.php";
            </script>';
        }else{
            $err['matkhau'] = "Password is wrong";
        }

    }else{
        $err['tendangnhap'] = "Username is not found";
    }


}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <title>Dirty Coin</title>

    <!--jquery-->
    <script src="//code.jquery.com/jquery.js"></script>
    <!--    boostrap javascript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/9e832626f4.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>Login</title>
    <header>
  <a href="../giaodien/index.php"><img src="../images/avt.png" class="logo" style="width:130px;"><!--LOGO --></a>

  <div id="menu" style="margin-top:10px;">
    <ul>
      <li class="home"><a href="/Project_shop_clothes/giaodien/index.php">Home</a></li><!--Trang chủ -->
      <li>
        <a href="#">Shirt</a><!--Top -->
        <ul class="sub-menu">
          <li><a href="/Project_shop_clothes/giaodien/thucdon.php?id_category=1">Hoodie</a></li>
          <li><a href="/Project_shop_clothes/giaodien/thucdon.php?id_category=2">T-Shirt</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Pants</a><!--Bottom -->
        <ul class="sub-menu">
          <li><a href="/Project_shop_clothes/giaodien/thucdon2.php?id_category=4">Trouser</a></li>
          <li><a href="/Project_shop_clothes/giaodien/thucdon2.php?id_category=3">Short</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Collection</a><!--Collection -->
        <ul class="sub-menu">
          <li><a href="/Project_shop_clothes/giaodien/thucdon_2.php?id_sanpham=1">One piece</a></li>
          <li><a href="/Project_shop_clothes/giaodien/thucdon_2.php?id_sanpham=2">Spring of the Y</a></li>
          <li><a href="/Project_shop_clothes/giaodien/thucdon_2.php?id_sanpham=3">Liliwyun</a></li>
        </ul>
      </li>
      <li><a href="/Project_shop_clothes/AboutUs/AboutUs.php">About us</a></li><!--About us -->
    </ul>
  </div>

  <div class="other"><!--Other -->


    <div class="login">
      <?php

      if (isset($_SESSION['name'])) {
        $user_admin = $_SESSION['name'];
        if ($user_admin == 'Admin_Chu') {

          echo '<a style="color:black;" href="">' . $_SESSION['submit'] . '</a>
                                <div class="logout">
                                <a href="/Project_shop_clothes/admin/login.php"><i class="fas fa-user-edit"></i>Admin</a> <br>                            
                                <a href="/Project_shop_clothes/index.php?dangxuat=1"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                                </div>';
        } else {
          echo '<a style="color:black;" href="">' . $_SESSION['name'] . '</a>
                                <div class="logout">
                                <a href="#"><i class="fas fa-exchange-alt"></i>Đổi mật khẩu</a> <br>                           
                                <a href="/Project_shop_clothes/giaodien/index.php?dangxuat=1"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                                </div>';
        }
      } else {
        echo '<a href="/Project_shop_clothes/login/login.php"">Đăng nhập</a>';
      }
      ?>

    </div>


    <li><a href="/Project_shop_clothes/cart/cart.php" style="text-decoration:none; "><i class="fas fa-shopping-bag"></i></a> <?php
        $cart = [];
        if (isset($_COOKIE['cart'])) {
            $json = $_COOKIE['cart'];
            $cart = json_decode($json, true);
        }
        $count = 0;
        foreach ($cart as $item) {
            $count++; // đếm tổng số item
        }
        ?>
      <span><?= $count ?></span>
    </li><!--icon GIỎ HÀNG -->
  </div>


</header>
<style>
li {
    list-style: none;
    /* bỏ chấm tròn của Others*/
  }
  .home{
    background-color: rgba(241, 241, 241, 0.873);
    border: currentColor;
    border-radius: 12px;
  }

  body {
    /* chỉnh màu background menu (màu ô chứa chữ ko thay đổi)*/
    background-color: white;
  }

  header {
    /* chỉnh menu*/
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0px 5%;
    margin-top: 0px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color: #ffffff;
    z-index: 1;
    box-shadow: 2px 2px 2px rgba(241, 241, 241, 0.873);
    float: left;
  }



  /* ---------------chỉnh logo----------------*/
  header img {
    width: 150px;
    cursor: pointer;
  }



  /* ---------------chỉnh other (search,shopping,user)----------------*/
  .other {
    display: flex;
  }

  .other>li {
    padding: 0 12px ;
  }

  .other>li:first-child {
    position: relative;
  }

  .other>li:first-child input {
    /* chỉnh ô tìm kiếm*/
    width: 100%;
    /* chỉnh  độ dài ô tìm kiếm*/
    height: 100%;
    /* chỉnh độ rộng ô tìm kiếm*/
    margin-top: -20px;
    margin-left: -20px;
    border: 10px;
  }

  .other>li:first-child i {
    position: absolute;
    right: 10px;
    /* chỉnh vị trí  Icon search */
  }


  /* ---------------------------chỉnh Menu-------------------------------*/
  .login {
    padding: 0;
    border: 1px solid rgb(196, 196, 196);
    border-radius: 3px;
    margin: 0 50px;
    position: relative;
    white-space: nowrap;
    }
    .login:hover {
    box-shadow: 0 0 3px 0 grey;
    cursor: pointer;
    }
    .login a {
    padding: 15px;
    text-decoration: none;
    color: #676767;
    font-weight: 700;
    }
    .login:hover .logout{
    display: block;
    }
    .login .logout{
    display: none;
    position: absolute;
    top: 2.3rem;
    left: 0;
    z-index: 10;
    width: 210%;
    border: 1px solid grey;
    border-radius: 5px;
    padding: 10px 0;
    background-color: #ffffff;
    white-space: nowrap;
    

    }
    .login .logout a{
    color: black;
    font-weight: 500;
    border-radius: 5px;
    margin: 10px 0;
    
    }
    .login .logout a:hover{
    opacity: 0.8;
    }

  #menu {
    list-style: none;
    display: flex;
  }

  #menu ul {
    list-style-type: none;
    background: #ffffff;
    /*  chỉnh màu ô chứa chữ */
    text-align: center;
    padding: 0px;
  }

  #menu ul li {
    color: #0f0f0f;
    display: inline-table;
    width: 120px;
    /* khoảng cách giữa các chữ trong menu */
    height: 30px;
    /* khoảng cách giữa menu và banner*/
    line-height: 50px;
    /* khoảng cách giữa menu và thanh tìm kiếm*/
    position: relative;
    
    /* chỉnh khung menu xuống thành 1 hàng dọc */

  }

  #menu ul li a {
    color: #060606;
    /* chỉnh màu chữ trên thanh menu */
    text-decoration: none;
    display: block;
    font-size: 17px;
    justify-content: center;
    /* chỉnh cỡ chữ trên thanh menu*/
  }

  #menu ul li a:hover {
    background: rgba(123, 123, 123, 0.262);
    /* chỉnh màu Ô lúc dê chuột vào */
    color: #333;
    /* chỉnh màu chữ trong Ô lúc dê chuột vào */

  }

  #menu ul li>.sub-menu {
    display: none;
    position: absolute;
    background-color: #ffffff;
    /* chỉnh màu Ô đa cấp lúc dê chuột vào */
    z-index: 1;
    list-style: none;
  }

  #menu ul li:hover .sub-menu {
    display: block;
  }
</style>
    <style>
      .footer{
        transform: translateY(-70%);
        height: 150px;
      }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: #0250c5;
            background: -webkit-linear-gradient(bottom, #0250c5, #d43f8d);
            background: -o-linear-gradient(bottom, #0250c5, #d43f8d);
            background: -moz-linear-gradient(bottom, #0250c5, #d43f8d);
            background: linear-gradient(bottom, #0250c5, #d43f8d);
        }

        .container {
            margin-bottom: 100px;
            max-width: 500px;
            width: 100%;
            background: rgba(255,255,255,1);
            padding: 25px 30px;
            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            margin-top: 150px;
        }

        .container .title {
            font-size: 35px;
            position: relative;
            text-align: center;
        }

        .content form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            display: block;
            margin: 12px auto;
            border: 0;
            border-radius: 5px;
            padding: 1px 10px;
            width: 100%;
            outline: none;
            color: #000000;
        }

        form .input-box span.details {
            display: block;
            margin-left: 5px;
            font-size: 13px;
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 15px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #9b59b6;
        }

        form .button {
            height: 45px;
            margin: 35px 0
        }

        form .button input {
            height: 100%;
            width: 100%;
            border-radius: 15px;
            border: none;
            color: white;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: black;
        }

        form i {
            font-size: 15px;
        }

        form p {
            font-size: 12px;
            margin-bottom: -2px;
        }

        form .has-error {
            color: red;
        }

        form .button input:hover {
            background:#d43f8d;
        }
        .has-error{
            color: red;
        }
    </style>

</head>
<body>


<div class="container">
    <div class="title">LOGIN</div>
    <div class="content">
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="tendangnhap" placeholder="Enter your username" value="<?php if (isset($_POST['tendangnhap'])) {
                        echo $_POST['tendangnhap'];} ?>">
                    <div class="has-error">
                        <span><?php echo (isset($err['tendangnhap'])?$err['tendangnhap']:''); ?></span>
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" id="valid_password" name="matkhau" class="password_login"
                           placeholder="Enter your password"
                           value="<?php if (isset($_POST['matkhau'])) {
                               echo $_POST['matkhau'];
                           } ?>">
                    <i class="bi bi-eye-slash togglePassword_login" style="margin-left: -40px"></i>
                    <p class="has-error">
                        <?php echo (isset($err['matkhau']) ? $err['matkhau'] : ''); ?>
                    </p>
                </div>
            </div>

            <div class="button">
                <input type="submit" name="login" value="Login">
            </div>
            <div class="text-center">Do not have an account? <a href="dangky.php">Register</a> </div>
        </form>
    </div>
</div>


<script>
    //show hide pwd in login section
    const togglePassword_login = document.querySelector(".togglePassword_login");
    const password_login = document.querySelector(".password_login");

    togglePassword_login.addEventListener("click", function () {
        // toggle the type attribute
        const type_login = password_login.getAttribute("type") === "password" ? "text" : "password";
        password_login.setAttribute("type", type_login);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });
</script>


<!--jquery-->
<script src="//code.jquery.com/jquery.js"></script>
<!--    boostrap javascript-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
        <div class="footer">
        <?php require_once('../giaodien/footer.php')?>
        </div>
</body>

</html>