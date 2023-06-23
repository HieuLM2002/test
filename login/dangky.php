
	  
<?php
include '../database/connect.php';
$conn = mysqli_connect('localhost', 'root', '', 'shop_quanao');
$select_register = "SELECT *FROM tbl_dangky";
$result = mysqli_query($conn, $select_register);


$err = [];
if (isset($_POST['register'])) {
    $cus_name = addslashes($_POST['tenkhachhang']);
    $username = addslashes($_POST['tendangnhap']);
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['dienthoai']);
    $address = addslashes($_POST['diachi']);
    $password = addslashes($_POST['matkhau']);

    $parttern_user = "/^[A-Za-z0-9_.]{6,32}$/";
    $parttern_email = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/";
    $partten_sdt = "/(0[3|5|7|8|9])+([0-9]{8})\b/";
    $pattern_password = "/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,32}$/";

    if (empty($cus_name)) {
        $err['tenkhachhang'] = "Name is required";
    }

    if (empty($username)) {
        $err['tendangnhap'] = "Username is required";
    } else if (!preg_match($parttern_user, $username)) {
        $err['tendangnhap'] = "Validation error";
    }
    while ($row = mysqli_fetch_assoc($result)) {
        if ($_POST['tendangnhap'] == $row['username']) {
            $err['tendangnhap'] = "User already exists";
        }
    }

    if (empty($email)) {
        $err['email'] = "Email is required";
    }

    if (empty($password)) {
        $err['matkhau'] = "Password is required";
    }

    if (empty($phone)) {
        $err['dienthoai'] = "Phone number is required";
    } else if (!preg_match($partten_sdt, $phone)) {
        $err['dienthoai'] = "*";
    }

    if (empty($address)) {
        $err['diachi'] = "Address is required";
    }

    if (empty($err)) {
        $pass = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO tbl_dangky(name_client,username,email,password,number_phone,address)
            VALUES ('$cus_name','$username','$email','$pass','$phone','$address')";
        $query = mysqli_query($conn, $sql);
        if ($query) {  echo '<script">
            alert("Đăng nhập Admin thành công!");   
        </script>';
        header("location:login.php");
            
        }

    } else {
        echo "<script>alert ('Validation error')</script>";
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
    <!----bootstrap---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <title>Registration</title>
    <header>
<a href="../giaodien/index.php"><img src="../images/avt.png" class="logo" style="width:130px;"><!--LOGO --></a>
        
  <div id="menu" style="margin-top:10px;">
                    <ul>
                        <li><a href="/Project_shop_clothes/giaodien/index.php">Home</a></li><!--Trang chủ -->
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
                
                if(isset($_SESSION['submit'])) {
                    $user_admin = $_SESSION['submit'];
                            if($user_admin == 'Admin_Chu') {
                                
                                echo '<a style="color:black;" href="">' . $_SESSION['submit'] . '</a>
                                <div class="logout">
                                <a href="/Project_shop_clothes/admin/login.php"><i class="fas fa-user-edit"></i>Admin</a> <br>                            
                                <a href="/Project_shop_clothes/index.php?dangxuat=1"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                                </div>';
                                                        }
                            else{
                                echo '<a style="color:black;" href="">' . $_SESSION['submit'] . '</a>
                                <div class="logout">
                                <a href="#"><i class="fas fa-exchange-alt"></i>Đổi mật khẩu</a> <br>                           
                                <a href="/Project_shop_clothes/index.php?dangxuat=1"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                                </div>';
                                                        }
                } 
                else {
                             echo '<a href="/Project_shop_clothes/login/login.php"">Đăng nhập</a>';
                                }
                ?>
                    
            </div>
            
            
            <li><a href="/Project_shop_clothes/cart/cart.php" style="text-decoration:none; " ><i class="fas fa-shopping-bag"></i></a> <?php
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
                        <span><?= $count ?></span></li><!--icon GIỎ HÀNG -->
        </div>
        
        
</header>
    <style>
        li{
        list-style: none;/* bỏ chấm tròn của Others*/
    }
    body{/* chỉnh màu background menu (màu ô chứa chữ ko thay đổi)*/
        background-image:url(../images/clothes2.jpg) ;
        width: 100%;
        height: -10vh;
        background-size: 100% 100%;
        background-repeat: no-repeat;
        
    }
    header{/* chỉnh menu*/
        display:flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 5%;
        margin-top:0px; 
        position:fixed; 
        top:0;
        left:0;
        right:0;
        background-color: #ffffff;
        z-index: 1;
        box-shadow: 2px 2px 2px rgba(241, 241, 241, 0.873);
        float: left;
        
    }



    /* ---------------chỉnh logo----------------*/
    header img{
        width:150px;
        cursor:pointer;
    }



    /* ---------------chỉnh other (search,shopping,user)----------------*/
    .other{
        display:flex;
    }
    .other >li{
        padding:0 12px;
    }
    .other >li:first-child{
        position:relative;
    }
    .other >li:first-child input{/* chỉnh ô tìm kiếm*/
        width:100%;/* chỉnh  độ dài ô tìm kiếm*/
        height:100%;/* chỉnh độ rộng ô tìm kiếm*/
        margin-top: -20px;
        margin-left: -20px;
        border:10px;
    }
    .other >li:first-child i{
        position:absolute;
        right:10px;/* chỉnh vị trí  Icon search */
    }


    /* ---------------------------chỉnh Menu-------------------------------*/
    .login {
    padding: 0px;
   
    border-radius: 3px;
    margin: 0 50px;
    position: relative;
  }

  .login:hover {
    box-shadow: 0px 0px 3px 0px grey;
    cursor: pointer;
  }

  .login a {
    padding: 15px;
    text-decoration: none;
    color: #676767;
    font-weight: 700;
  }

  .login:hover .logout {
    display: block;
  }

  .login .logout {
    display: none;
    position: absolute;
    top: 2.3rem;
    left: 0px;
    z-index: 10;
    width: 150%;
    border: 1px solid grey;
    border-radius: 5px;
    padding: 10px 0;
  }

  .login .logout a {
    color: black;
    font-weight: 500;
    border-radius: 5px;
    margin: 10px 0;
  }

  .login .logout a:hover {
    opacity: 0.8;
  }

  #menu {
    list-style: none;
    display: flex;
    background: transparent;
    backdrop-filter: blur(10px)
  }

  #menu ul {
    list-style-type: none;
    background: #ffffff;
    /*  chỉnh màu ô chứa chữ */
    text-align: center;
    padding: 0px;
    background: transparent;
    backdrop-filter: blur(10px)
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
    background: transparent;
    backdrop-filter: blur(10px)
  }

  #menu ul li a {
    color: #060606;
    /* chỉnh màu chữ trên thanh menu */
    text-decoration: none;
    display: block;
    font-size: 17px;
    justify-content: center;
    /* chỉnh cỡ chữ trên thanh menu*/
    background: transparent;
    backdrop-filter: blur(10px)
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

  .footer{
    transform: translateY(-70%);
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
            margin-bottom: 150px;
            max-width: 700px;
            width: 100%;
            background: rgba(255,255,255,1);
            padding: 25px 30px;
            border-radius: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            margin-top: 80px;
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
            margin: 20px auto;
            border: 0;
            border-radius: 5px;
            padding: 1px 10px;
            width: 320px;
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
    </style>

</head>
<body>


<div class="container">
    <div class="title">REGISTRATION</div>
    <div class="content">
        <form action="" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full name</span>
                    <input type="text" name="tenkhachhang" placeholder="Enter your name"
                           value="<?php if (isset($_POST['tenkhachhang'])) {
                               echo $_POST['tenkhachhang'];
                           } ?>">
                    <p class="has-error">
                        <?php echo (isset($err['tenkhachhang']) ? $err['tenkhachhang'] : ''); ?>
                    </p>
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="tendangnhap" id="valid_username" placeholder="Enter your username"
                           value="<?php if (isset($_POST['tendangnhap'])) {
                               echo $_POST['tendangnhap'];
                           } ?>">
                    <p class="has-error">
                        <?php echo (isset($err['tendangnhap']) ? $err['tendangnhap'] : ''); ?>
                    </p>
                    <p id="msg_valid_username"></p>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" id="valid_email" placeholder="Enter your email"
                           value="<?php if (isset($_POST['email'])) {
                               echo $_POST['email'];
                           } ?>">
                    <p class="has-error">
                        <?php echo (isset($err['email']) ? $err['email'] : ''); ?>
                    </p>
                    <p id="msg_valid_email"></p>
                </div>
                <div class="input-box">
                    <span class="details">Phone number</span>
                    <input type="text" name="dienthoai" id="valid_phone" placeholder="Enter your number"
                           value="<?php if (isset($_POST['dienthoai'])) {
                               echo $_POST['dienthoai'];
                           } ?>">
                    <p class="has-error">
                        <?php echo (isset($err['dienthoai']) ? $err['dienthoai'] : ''); ?>
                    </p>
                    <p id="msg_valid_phone"></p>
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
                    <p id="msg_valid_password"></p>
                </div>

                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" name="diachi" placeholder="Enter your Address"
                           value="<?php if (isset($_POST['diachi'])) {
                               echo $_POST['diachi'];
                           } ?>">
                    <p class="has-error">
                        <?php echo (isset($err['diachi']) ? $err['diachi'] : ''); ?>
                    </p>
                </div>
            </div>

            <div class="button">
                <input type="submit" name="register" value="Register">
            </div>
            <p style="text-align: center; font-size: 15px">
                Already have an account? <a href="login.php">Login</a>
            </p>
        </form>
    </div>
</div>
<script>
    var valid_password = document.getElementById('valid_password');
    var msg_valid_password = document.getElementById('msg_valid_password');

    valid_password.addEventListener('input', () => {

        if (valid_password.value.length < 4) {
            msg_valid_password.innerHTML = "Password is weak";
            valid_password.style.borderColor = "red";
            msg_valid_password.style.color = "red";
        } else if (valid_password.value.match(/^[A-Za-z0-9]{4,8}$/)) {
            msg_valid_password.innerHTML = "Password is medium";
            valid_password.style.borderColor = "orange";
            msg_valid_password.style.color = "orange";
        } else if (valid_password.value.match(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,32}$/)) {
            msg_valid_password.innerHTML = "Password is strong";
            valid_password.style.borderColor = "green";
            msg_valid_password.style.color = "green";
        }
    })

    var valid_username = document.getElementById('valid_username');
    var msg_valid_username = document.getElementById('msg_valid_username');

    valid_username.addEventListener('input', () => {
        if (valid_username.value.length < 6) {
            msg_valid_username.innerHTML = "Username must have at least 6-32 letter and not have special character";
            valid_username.style.borderColor = "red";
            msg_valid_username.style.color = "red";
        } else if (valid_username.value.match(/^[A-Za-z0-9_.]{6,32}$/)) {
            msg_valid_username.innerHTML = "Valid username";
            valid_username.style.borderColor = "green";
            msg_valid_username.style.color = "green";
        }
    })

    var valid_email = document.getElementById('valid_email');
    var msg_valid_email = document.getElementById('msg_valid_email');

    valid_email.addEventListener('input', () => {
        if (valid_email.value.length < 6) {
            msg_valid_email.innerHTML = "Invalid email";
            valid_email.style.borderColor = "red";
            msg_valid_email.style.color = "red";
        } else if (valid_email.value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/)) {
            msg_valid_email.innerHTML = "Valid email";
            valid_email.style.borderColor = "green";
            msg_valid_email.style.color = "green";
        }
    })

    var valid_phone = document.getElementById('valid_phone');
    var msg_valid_phone = document.getElementById('msg_valid_phone');

    valid_phone.addEventListener('input', () => {
        if (valid_phone.value.length < 1) {
            msg_valid_phone.innerHTML = "Invalid phone number";
            valid_phone.style.borderColor = "red";
            msg_valid_phone.style.color = "red";
        } else if (valid_phone.value.match(/(0[3|5|7|8|9])+([0-9]{8})\b/)) {
            msg_valid_phone.innerHTML = "Valid phone number";
            valid_phone.style.borderColor = "green";
            msg_valid_phone.style.color = "green";
        } else if (valid_phone.value.length > 10) {
            msg_valid_phone.innerHTML = "Invalid phone number";
            valid_phone.style.borderColor = "red";
            msg_valid_phone.style.color = "red";
        }
    })
</script>
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
