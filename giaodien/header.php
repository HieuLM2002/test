 <?php
            session_start();
            if(isset($_GET['dangxuat']) && $_GET['dangxuat']=1){
                unset($_SESSION['name']);
                header('location:index.php');
            }
            
?> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
    <link rel="stylesheet" href="./login.css">
    <link rel="shortcut icon" type="image/png" href="/Project_shop_clothes/admin/product/uploads/avt3.png"/>
  <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script><!--link lấy icon -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Dirty Coin</title>
</head>
<!-----------------------HEARDER ----------------------------------------->
<header>
  <a href="../giaodien/index.php"><img src="../images/avt.png" class="logo" style="width:130px;"><!--LOGO --></a>

  <div id="menu" style="margin-top:10px;">
    <ul>
      <li class="home"><a href="/Project_shop_clothes/giaodien/index.php">Home</a></li><!--Trang chủ -->
      <li>
        <a href="#">Top</a><!--Top -->
        <ul class="sub-menu">
          <li><a href="/Project_shop_clothes/giaodien/thucdon.php?id_category=1">Hoodie</a></li>
          <li><a href="/Project_shop_clothes/giaodien/thucdon.php?id_category=2">T-Shirt</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Bottom</a><!--Bottom -->
        <ul class="sub-menu">
          <li><a href="/Project_shop_clothes/giaodien/thucdon2.php?id_category=4">Trouser</a></li>
          <li><a href="/Project_shop_clothes/giaodien/thucdon2.php?id_category=3">Short</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Collection</a><!--Collection -->
        <ul class="sub-menu">
          <li>
            
            <?php
            require_once('../database/dbper.php');
            $conn = "select * from category where id > 4";
            $categoryList = executeResult($conn);
            foreach($categoryList as $item){
              
              echo '<td><a href="/Project_shop_clothes/giaodien/thucdon_2.php?id_sanpham='.$item['id'].'">'.$item['name'].'</a>';
            }

            ?>
          </li>
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
                                <a href="/Project_shop_clothes/login/change_password.php"><i class="fas fa-exchange-alt"></i>Đổi mật khẩu</a> <br>                           
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
              $count += $item['num'];  // đếm tổng số item
                        }
            ?>
      <span><?= $count ?></span>
    </li><!--icon GIỎ HÀNG -->
  </div>


</header>
<style>
    
    li{
        list-style: none;/* bỏ chấm tròn của Others*/
    }
    body{/* chỉnh màu background menu (màu ô chứa chữ ko thay đổi)*/
        background-color: white;
    }
    header{/* chỉnh menu*/
        display:flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 5%;
        margin-top:0;
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
        list-style:none;
        display: flex;
    }

    #menu ul{
        list-style-type: none;
        background:#ffffff;   /*  chỉnh màu ô chứa chữ */
        text-align: center;
        padding: 0;
    }
    #menu ul li{
        color:#0f0f0f;
        display:inline-table;
        width:120px;/* khoảng cách giữa các chữ trong menu */
        height:30px;/* khoảng cách giữa menu và banner*/
        line-height: 50px;/* khoảng cách giữa menu và thanh tìm kiếm*/
        position:relative;   /* chỉnh khung menu xuống thành 1 hàng dọc */
    
    }
    #menu ul li a{
        color:#060606;/* chỉnh màu chữ trên thanh menu */
        text-decoration: none;
        display:block;
        font-size:17px;/* chỉnh cỡ chữ trên thanh menu*/
    }
    #menu ul li a:hover{
        background:rgba(123, 123, 123, 0.262);/* chỉnh màu Ô lúc dê chuột vào */
        color:#333;/* chỉnh màu chữ trong Ô lúc dê chuột vào */
        
    }
    #menu ul li >.sub-menu{
        display: none;
        position: absolute;
        background-color:  #ffffff;/* chỉnh màu Ô đa cấp lúc dê chuột vào */
        z-index: 1;
        list-style: none;
    }

    #menu ul li:hover .sub-menu{
        display:block;
    }
</style>