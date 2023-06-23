//Trong đoạn code này, nó bắt đầu bằng việc kiểm tra xem phiên đăng nhập đã được khởi tạo hay
chưa bằng câu lệnh session_start(), nếu phiên đăng nhập chưa được khởi tạo, nó sẽ yêu cầu người
dùng đăng nhập bằng câu lệnh chuyển hướng đến trang đăng nhập.
<?php
            session_start();
            if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
                unset($_SESSION['submit']);
                header('Location:index.php');
            }
?>
<?php
require_once('../database/dbper.php');
require_once('../utily/utility.php');
require_once('checkout-form.php');
//Sau đó, đoạn code kiểm tra nếu người dùng đã đăng nhập bằng cách kiểm tra xem
// biến $_SESSION['name'] có tồn tại hay không. Nếu tồn tại, biến $cartt sẽ được khởi tạo là một
// mảng rỗng để lưu giỏ hàng. Sau đó, đoạn code kiểm tra nếu giỏ hàng của người dùng tồn tại trong
// cookie bằng cách kiểm tra xem biến $_COOKIE['cart'] có tồn tại hay không. Nếu có, nó sẽ chuyển đổi
// nó thành một mảng và lưu vào biến $cartt.

//Tiếp theo, đoạn code tạo một danh sách các ID sản phẩm từ giỏ hàng bằng cách duyệt qua
// mảng $cartt và lấy ra giá trị của khóa 'id' trong mỗi phần tử và lưu vào mảng $idList.
// Sau đó, nếu số phần tử của $idList lớn hơn 0, mảng này sẽ được chuyển đổi thành một chuỗi ID
// sản phẩm cách nhau bởi dấu phẩy bằng câu lệnh implode và lưu vào biến $list.
//
//Cuối cùng, nếu danh sách ID sản phẩm không rỗng, đoạn code truy vấn cơ sở dữ liệu để lấy thông
// tin chi tiết của các sản phẩm đó bằng câu lệnh SELECT. Nếu danh sách ID sản phẩm rỗng, không có
// câu lệnh SELECT nào được thực thi.
if(!isset($_SESSION['name'])){
    echo '<script>
    alert("Bạn Phải Đăng Nhập Trước Khi Thanh Toán!"); 
    window.location = "../login/login.php";
    </script>'; 

}else{

$cartt = [];
if (isset($_COOKIE['cart'])) {
    $json = $_COOKIE['cart'];
    $cartt = json_decode($json,true);
}
$idList = [];
foreach ($cartt as $item) {
    $idList[] = $item['id'];
    
    
}
if (count($idList) > 0) {
    $idList = implode( ',',$idList); // chuyeern
    //[2, 5, 6] => 2,5,6
    
    $list = ltrim($idList,',');
    if(empty($list)){
    $sql = "select * from product where id in ('$list')";
    }elseif(!empty($list)){
        $sql = "select * from product where id in ($list)";
    }
   
    $cartList = executeResult($sql);
    ;
} else {
    $cartList = [];
    
}}
?>
<!DOCTYPE html>
<html lang="en">
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
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script><!--link lấy icon -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Đăng nhập</title>
</head>
<!-----------------------HEARDER ----------------------------------------->
<header>
<a href="../giaodien/index.php"><img src="../images/avt.png" class="logo" style="width:130px;"><!--LOGO --></a>
        
  <div id="menu" style="margin-top:10px;">
                    <ul>
                        <li><a href="/Project_shop_clothes/giaodien/index.php">Home</a></li><!--Trang chủ -->
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
                                <li><a href="/Project_shop_clothes/giaodien/thucdon.php?id_category=4">Trouser</a></li>
                                <li><a href="/Project_shop_clothes/giaodien/thucdon.php?id_category=3">Short</a></li>
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
                                echo '<a style="color:black;" href="">' . $_SESSION['name'] . '</a>
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
                            $cartt = json_decode($json, true);
                        }
                        $count = 0;
                        foreach ($cart as $item) {
                            $count ++; // đếm tổng số item
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
        background-color: white;
    }
    header{/* chỉnh menu*/
        display:flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 5%;
        margin-top: 0;
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
    width: 150%;
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


<body>
    <div id="wrapper">
                        <?php
                        $cart = [];
                        if (isset($_COOKIE['cart'])) {
                            $json = $_COOKIE['cart'];
                            $cart = json_decode($json, true);
                        }
                        $count = 0;
                        foreach ($cart as $item) {
                            $count += $item['num']; // đếm tổng số item
                        }
                        ?>
                    </div>
                </section>
            </div>
        </header> 
        
        <!-- END HEADR -->
        <main>
            <section class="cart" style="padding-top: 150px;">
                <form action="" method="POST">
                    <div class="container">
                        <h3 style="text-align: center;">Tiến hành đặt hàng</h3>
                        <div class="row">
                            <div class="panel panel-primary col-md-6">
                                <h4 style="padding: 2rem 0; border-bottom:1px solid black;">Nhập thông tin mua hàng </h4>
                                <div class="form-group">
                                    <label for="usr">Họ và tên:</label>
                                    <input required="true" type="text" class="form-control" id="usr" name="fullname">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input required="true" type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Số điện thoại:</label>
                                    <input required="true" type="text" class="form-control" id="phone_number" name="phone_number">
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ:</label>
                                    <input required="true" type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="note">Ghi chú:</label>
                                    <textarea class="form-control" rows="3" name="note" id="note"></textarea>
                                </div>

                            </div>
                            <!-- <button onclick="hienthi()"><i class="fas fa-angle-down"></i> Xem lại đơn hàng</button> -->

                            <div class="panel panel-primary col-md-6">
                                <h4 style="padding: 2rem 0; border-bottom:1px solid black;">Đơn hàng</h4>
                                <table class="table table-bordered table-hover none">
                                    <thead>
                                        <tr style="font-weight: 500;text-align: center;">
                                            <td width="50px">STT</td>
                                            <td>Tên Sản Phẩm</td>
                                            <td>Số lượng</td>
                                            <td>Tổng tiền</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         
                                        $count = 0;
                                        $total = 0;
                                        foreach ($cartList as $item) {
                                            $num = 0;
                                            foreach ($cart as $value) {
                                                if ($value['id'] == $item['id']) {
                                                    $num = $value['num'];
                                                    break;
                                                }
                                            }
                                            $total += $num * $item['price'];
                                            echo '
                                    <tr style="text-align: center;">
                                        <td width="50px">' . (++$count) . '</td>
                                        <td style="text-align:center; display:flex">
                                            <img src="../admin/product/' . $item['thumbnail'] . '" alt="" style="width: 50px;margin:0 1rem 0 1rem;"> <span>' . $item['title'] . '</span>
                                        </td>
                                        <td width="100px">' . $num . '</td>
                                        <td class="b-500 red">' . number_format($num * $item['price'], 0, ',', '.') . '<span> VNĐ</span></td>
                                       
                                    </tr>
                                    ';
                                        }
                                        
                                        ?>
                                    </tbody>
                                </table>
                                <p>Tổng đơn hàng: <span class="bold red"><?= number_format($total, 0, ',', '.') ?><span> VNĐ</span></span></p>
                                <a href="../product/dashboard.php"><button class="btn btn-success">Đặt hàng</button></a>
                            </div>
                        </div>

                    </div>
                </form>

            </section>
        </main>
        
    </div>
    <script type="text/javascript">
        function deleteCart(id) {
            $.post('cookie.php', {
                'action': 'delete',
                'id': id
            }, function(data) {
                location.reload()
            })
        }
    </script>
</body>
<style>
    .xemlai {
        font-size: 18px;
        font-weight: 500;
        color: blue;
    }

    .b-500 {
        font-weight: 500;
    }

    .bold {
        font-weight: bold;
    }

    .red {
        color: rgba(207, 16, 16, 0.815);
    }
</style>

</html>
<!--------------------FOOTER--------------------------- -->
<footer class="section-p1"><!--mục footer -->
    <div class="col">
        <h4>HỆ THỐNG CỬA HÀNG</h4><!--Hệ thông cửa hàng -->
        <p>Quận 10 - 561 Sư Vạn Hạnh, Phường 13.</p>
        <p>Quận Tân Bình - 136 Nguyễn Hồng Đào, Phường 14.</p>
        <p>Quận Gò Vấp - 41 Quang Trung, Phường 3.</p>
        <p>Đống Đa - 49-51 Hồ Đắc Di, Phường Nam Đồng.</p>
    </div> 
    <div class="col">
        <h4>THÔNG TIN LIÊN HỆ</h4><!--Thông tin liên hệ -->
        <p>Tuyển dụng:<a href ="liên kết "> link Website </a> </p>
        <p>Website:<a href ="liên kết "> link Website </a></p>
        <p>Liên hệ CSKH: support@<a href ="liên kết "> link Website </a></p>
        <p>For business: contact@<a href ="liên kết "> link Website </a></p>
    </div>
    <div class="col">
        <h4>FOLLOW US ON SOCIAL MEDIA</h4><!--Follow us on social media-->
        <li><i class="fa fa-facebook"></i></li>
        <li><i class="fa fa-instagram"></i></li>
        <li><i class="fa fa-youtube"></i></li>            
    </div>    
</footer>
<style>
/*----------------FOOTER--------------------*/

footer{
    background:rgb(0, 0, 0);
    display:flex;
    margin-top:0px;
    justify-content: space-around;
    margin-bottom:0px;
    padding-bottom: 10px;   /*chỉnh size background đen */
    
}
footer.col{
    
    display:flex;
    flex-direction:column;
    align-items: flex-start;
    margin-top: 100px;
}
footer h4{   /*chỉnh size chữ H4*/
    color:rgb(255, 255, 255);
    font-size: 16px;
    padding-bottom:30px;
    margin-top:40px;
    font-weight: bold;
}
footer p{  /*chỉnh size chữ P*/
    color:rgb(255, 255, 255);
    font-size: 13px;
    text-decoration:none;
    margin-bottom:15px;

 
}
footer li{ /*chỉnh icon fb,instagram,youtube*/
    color:#fff;
    margin-top: 3px;
    font-weight: bold;
    
   
}

</style>