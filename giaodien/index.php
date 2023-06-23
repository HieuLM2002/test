<?php
// session_start();
// if(!isset($_SESSION['submit'])){
// 	header('Location: login.php');
// }
?>

<?php
require_once '../database/connect.php';
require_once '../database/dbper.php';
?>
<?php
include("../giaodien/header.php");
?>


<!--------------------BANNER ONE PIECE--------------------------- -->
<div id="banner1" style="background-repeat:no-repeat;">
    <div class="box-left">
        <a href="thucdon_2.php?id_sanpham=1"><button>Mua ngay </button><!--nút mua hàng --></a>
    </div>
</div>
<!--------------------NEW ARRIVALS--------------------------- -->
<section class="main">
    <section class="recently" style="padding-bottom: 50px;">
        <div class="title">
            <h1>NEW ARRIVALS</h1>
        </div>
        <div class="product-recently">
            <div class="row">
                <?php
                $sql = 'SELECT * from product, order_details,report where order_details.product_id=product.id AND product.id=report.id_report order by order_details.num DESC limit 4';
                $productList = executeResult($sql);
                $index = 1;
                foreach ($productList as $item) {
                    echo '
                                <div class="col">
                                    <a href="details.php?id=' . $item['product_id'] . '">
                                        <img class="thumbnail" src="../admin/product/' . $item['thumbnail'] . '" alt="">
                                        <div class="title">
                                            <p class ="title2">' . $item['title'] . '</p>
                                        </div>
                                        <div class="price">
                                            <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                        </div>
                                        <div class="more">
                                            <div class="star">
                                                <img src="../images/icon/icon-star.svg" alt="">
                                                <span>' . $item['star'] . '</span>
                                            </div>
                                            <div class="time">
                                                <img src="../images/icon/icon-clock.svg" alt="">
                                                <span>' . $item['comment'] . ' comment</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                }
                ?>
            </div>
        </div>
    </section>
    <!--------------------BANNER SPRING OF THE Y--------------------------- -->
    <div id="banner2"><!--banner2 baneer rồng -->
        <div class="box-left">
            <h2>
                <span>SPRING OF THE ¥ </span>
            </h2>
            <a href="thucdon_2.php?id_sanpham=2"><button>Mua ngay </button><!--nút mua hàng --></a>
        </div>
    </div>
    <!--------------------BANNER LILIWYUN--------------------------- -->
    <div id="banner3"><!--banner3 banner liliwyun  -->
        <div class="box-left">
            <a href="thucdon_2.php?id_sanpham=3"><button>Mua ngay </button><!--nút mua hàng --></a>
        </div>
    </div>

    <!--------------------WHAT'S HOT--------------------------- -->
    <div id="new">
        <h2 id="hot">WHAT'S HOT</h2>
        <ul id="list-new">
            <div class="item"><!--sản phẩm 1 -->
                <div id="slider">
                    <input type="radio" name="slider" id="s1" checked>
                    <input type="radio" name="slider" id="s2">
                    <input type="radio" name="slider" id="s3">
                    <input type="radio" name="slider" id="s4">
                    <input type="radio" name="slider" id="s5">
                    <label for="s1" id="slider1">
                        <img src="../images/new1,2.jpg">
                    </label>
                    <label for="s2" id="slider2">
                        <img src="../images/new1,1.jpg">
                    </label>

                    <label for="s3" id="slider3">
                        <img src="../images/new1.jpg">
                    </label>

                    <label for="s4" id="slider4">
                        <img src="../images/new1,3.jpg">
                    </label>

                    <label for="s5" id="slider5">
                        <img src="../images/new1,4.jpg">
                    </label>
                </div>
                <div id="box1">
                    <div class="name">DIRTYCOINS X LIL' WUYN: CÚ BẮT TAY </div>
                    <div class="name">ĐẬM CHẤT VĂN HÓA ĐƯỜNG PHỐ</div>
                </div>

            </div>
            <div class="box-left">
                <a href="../AboutUs/Dirtycoins/Dirtycoins.php"><button>Xem thêm </button><!--nút mua hàng --></a>
            </div>
            <div class="item"><!--sản phẩm 2 -->
                <div id="slide" class="slide">
                    <input type="radio" name="slide" id="s21" v checked>
                    <input type="radio" name="slide" id="s22">
                    <input type="radio" name="slide" id="s23">
                    <input type="radio" name="slide" id="s24">
                    <input type="radio" name="slide" id="s25">
                    <label for="s21" id="slide1">
                        <img src="../images/new2.jpg">
                    </label>
                    <label for="s22" id="slide2">
                        <img src="../images/new2,1.jpg">
                    </label>

                    <label for="s23" id="slide3">
                        <img src="../images/new2,2.jpg">
                    </label>

                    <label for="s24" id="slide4">
                        <img src="../images/new2,3.jpg">
                    </label>

                    <label for="s25" id="slide5">
                        <img src="../images/new2,4.jpg">
                    </label>
                </div>
                <div id="box2">
                    <div class="name">7 TIPS PHỐI ĐỒ VỚI VARSITY JACKET </div>
                    <div class="name">THU HÚT MỌI ÁNH</div>
                </div>
            </div>
            <div class="box-left" id="box2left">
                <a href="../AboutUs/7 TIPS PHỐI ĐỒ VỚI VARSITY JACKET/7 TIPS PHỐI ĐỒ VỚI VARSITY JACKET.php"><button>Xem thêm </button><!--nút mua hàng --></a>
            </div>
            <div class="item"><!--sản phẩm 1 -->
                <div id="boxname">
                    <div class="name">THÔNG TIN CHƯƠNG TRÌNH </div>
                    <div class="name">THẺ THÀNH VIÊN DIRTYCOINS</div>
                </div>
                <div >
                <img src="../images/new3.jpg" width="340" height="340" alt="" id="imgbox3" >
                </div>
                <div class="box-left" id="boxleft4">
                    <a href="../AboutUs/THÔNG TIN CHƯƠNG TRÌNH/THÔNG TIN CHƯƠNG TRÌNH.php"><button id="btn4">Xem thêm </button><!--nút mua hàng --></a>
                </div>
            </div>

        </ul>
    </div>


    <!--------------------BANNER SALE--------------------------- -->
    <div id="banner4"><!--banner4 banner sale off  -->
        <div class="box-left" id="box4">
            <a href="../login/login.php"><button>SIGN UP FOR FREE →</button><!--nút đăng ký --></a>
        </div>
    </div>
    <div id="footer">
        <?php require_once('footer.php'); ?>
    </div>
    <style>
    /*--------------------------global css-----------------------*/
* {
  margin: 0;
  box-sizing: border-box;
  padding: 0;
  /*font-family: Arial, Helvetica, sans-serif;*/
  text-decoration: none;
  list-style: none;
}

a {
  text-decoration: none;
}

/*-------------------------header---------------------------*/

header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  background: white;
  box-shadow: 2px 2px 2px rgba(241, 241, 241, 0.873);
  padding: 0 10px 0 10px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  z-index: 1000;
}

.menu {
  background: white;
}

header .logo {
  width: 130px;
}

header .menu ul {
  list-style: none;
}

header .menu ul li {
  position: relative;
  float: left;
  width: 150px;
}

header .menu ul li a {
  text-decoration: none;
  font-size: 17px;
  padding: 20px;
  color: black;
  display: block;
  text-align: center;
  letter-spacing: 1px;
}

header .menu ul li ul li a {
  text-decoration: none;
  padding: 20px 0;
  border-top: 1px solid lightgray;
}

header .menu ul li a:hover {
  background: #EEEEEE;
  color: black;
}

header .menu ul li ul {
  position: absolute;
  width: 100%;
  background: white;
  display: none;
}

header .menu ul li ul li {
  width: 100%;
}

header .menu ul li:focus-within>ul,
header .menu ul li:hover>ul {
  display: initial;
}

#menu-bar {
  display: none;
}

header label {
  cursor: pointer;
  display: none;
}

#other {
  display: flex;
  margin-right: 30px;
}

#other i {
  font-size: 22px;
  color: black;
}

.other {
  margin-left: 10px;
}


@media (max-width: 1100px) {
  header {
    top: 0;
  }

  header label {
    display: initial;
  }

  header .menu {
    position: absolute;
    top: 100%;
    right: 0;
    background: #EEEEEE;
    display: none;
    width: 300px;
  }

  header .menu ul li {
    width: 100%;
    border: 1px solid lightgray;

  }

  header .menu ul li a:hover {
    background: lightgray;
  }

  header .menu ul li ul {
    width: 100%;
    top: 0;
    position: absolute;
    background: none;

  }

  header .menu ul li ul li {
    width: 100%;
    left: -100%;
    background: #EEEEEE;

  }

  header .menu ul li ul li a:hover {
    background: lightgray;
  }

  #menu-bar:checked~.menu {
    display: initial;
  }
}

header .nav_user ul {
  list-style: none;
}

header .nav_user ul li {
  position: relative;
  width: 100px;
}

header .nav_user ul li a {
  text-decoration: none;
  font-size: 17px;
  color: black;
  display: block;
  text-align: right;
  letter-spacing: 1px;
}

header .nav_user ul li ul li a {
  text-decoration: none;
  text-align: center;
}

header .nav_user ul li a:hover {
  color: black;
  border-bottom: 1px solid #EEEEEE;
}

header .nav_user ul li ul {
  position: absolute;
  width: 100%;
  background: white;
  display: none;
}

header .nav_user ul li ul li {
  width: 100px;
  float: right;
  border: 1px solid #EEEEEE;
}

header .nav_user ul li ul li a:hover {
  background: #EEEEEE;
}

header .nav_user ul li:focus-within>ul,
header .nav_user ul li:hover>ul {
  display: initial;
}
/*-------------------------------end header------------------------*/

   /* ------------------------Banner one piece------------------------------*/
 /** {*/
 /*  margin: 0;*/
 /*  padding: 0;*/
 /*  box-sizing: border-box;*/

 /*}*/
main .container {
  width: 90%;
  margin: 0px auto;
}

.search-quan {
  width: 100%;
  margin: auto;
  position: relative;
  display: flex;
  justify-content: center;
}

.search-quan i {
  position: absolute;
  left: 2%;
  top: 50%;
  transform: translateY(-50%);
  color: #676767;
}

.search-quan form {
  width: 100%;
}

.search-quan input {
  width: 90%;
  padding: 15px 50px;
  border-radius: 10px;
  outline: 0;
  border: 0;
  background-color: #f7f7f7;
}

#banner1 {
  width: 100%;

  background-image: url("../images/banner onepiece.png");

  height: 880px;
  /*chỉnh size banner*/
  margin-top: 70px;
  display: flex;
  padding: 0px 133px;
  position: relative;
}

#banner1 .box-left,
#banner .box-right {
  width: 50%;
}

.title2 {
  width: 240px;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 1;
  overflow: hidden;
}


#banner1 .box-left button {
  /*nút buttom mua ngay*/
  font-size: 20px;
  /*chỉnh size chữ*/
  width: 170px;
  /*chỉnh size dài bóng đen*/
  height: 45px;
  /*chỉnh size rộng bóng đen*/
  margin-top: 420px;
  /*chỉnh vị trí buttom lên xuống*/
  margin-left: -18px;
  /*chỉnh vị trí buttom trái phải*/
  background: #1d1a1a;
  border: none;
  outline: none;
  color: #fff;
  font-weight: bold;
  border-radius: 200px;
  transition: 0.4s;
  /*chỉnh tốc độ chuyển màu*/
}

#banner1 .box-left button:hover {
  /*màu sắc khi nhấp vô nút buttom mua ngay*/
  background: orange;
}



/* ------------------------NEW ARRIVALS------------------------------*/
section.main {
  padding: 0 0;
  width: 100%;
  margin: 0px auto;
}

section.main a {
  text-decoration: none;
}

section.main section.recently {
  padding-bottom: 3rem;
  padding-left: 3rem;
  padding-right: 3rem;
}

section.main section.recently .link a {
  text-decoration: none;
  color: black;
  font-size: 20px;
}

section.main section.recently .title h1 {
  font-size: 35px;
  margin: 0px;
  padding: 30px;
  color: black;
  text-align: center;
}

section.main section.recently .product-recently {
  padding-top: 2rem;
}

section.main section.recently .product-recently .row {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-column-gap: 30px;
  grid-row-gap: 30px;
}

section.main section.recently .product-recently .row .col img {
  width: 100%;
  border-radius: 10px;
}


section.main section.recently .product-recently .row .col img.thumbnail {
  border: 1px solid rgb(76, 78, 85);
  transition: 0.1s;
}

section.main section.recently .product-recently .row .col img.thumbnail:hover {
  box-shadow: 0px 0px 5px 0px grey;
}

section.main section.recently .product-recently .row .col .title p {
  font-size: 20px;
  font-weight: 600;
  padding: 0px;
  margin: 5px 0;
  color: black;
  font-family: "Encode Sans SC", sans-serif;
}

section.main section.recently .product-recently .row .col .price span {
  padding: 10px 0;
  color: #676767;
  font-size: 20px;
  font-weight: 600;
  color: rgba(207, 16, 16, 0.815);
  font-family: "Bebas Neue", cursive;
}

section.main section.recently .product-recently .row .col .dish span {
  padding: 10px 0;
  color: #676767;
}

section.main section.recently .product-recently .row .col .more {
  display: flex;
  color: #676767;
  padding: 5px 0;
  font-size: 18px;
}

section.main section.recently .product-recently .row .col .more .star {
  display: flex;
  align-items: center;
  justify-content: center;
}

section.main section.recently .product-recently .row .col .more .star img {
  width: 25px;
  height: 25px;

}

section.main section.recently .product-recently .row .col .more .time {
  display: flex;
  padding: 0 10px;

}

section.main section.recently .product-recently .row .col .more .time img {
  width: 24px;
  height: 24px;

}

#wp-products {
  /*căn nguyên lish new arrival và sản phẩm */
  padding-top: 130px;
  /*cách banner trên*/
  padding-bottom: 78px;
  padding-left: 0px;
  padding-right: 0px;
  /*căn phải với web*/
}

#wp-products h2 {
  text-align: center;
  margin-bottom: 76px;
  /*căn trên so với chữ new arrival*/
  font-size: 5px;
  /*size chữ New Arrival*/
  color: black;
  margin-left: 40px;
}


#list-products {
  font-size: 17px;
  /*size chữ sản phẩm*/
  display: flex;
  list-style: none;
  justify-content: space-around;
  align-items: center;
  flex-wrap: wrap;
}

#list-products .item {
  width: 100%;
  /*căn trái phải của hình ảnh so với lề*/
  height: 0px;
  /*chỉnh khung border sau ảnh*/
  background: #fafafa;
  border-radius: 0px;
  margin-bottom: 460px;
  /*chỉnh khoảng cách sản phẩm trên so với sản phẩm dưới*/
}


#list-products .item .name {
  text-align: center;
  color: rgb(10, 10, 10);
  font-weight: bold;
  margin-top: 0px;
  /*chỉnh khoảng cách từ tên so với sản phẩm*/
}

#list-products .item .price {
  text-align: center;
  color: #090909;
  font-weight: bold;
  margin-top: 0px;
  /*chỉnh khoảng cách từ giá tiền so với tên sản phẩm*/
}


.list-page {
  width: 50%;
  margin: 0px auto;
}

.list-page {
  display: flex;
  list-style: none;
  justify-content: center;
  align-items: center;
}


/* ------------------------Banner SPRING OF THE Y------------------------------*/
#banner2 {
  /* banner rồng*/
  width: 100%;
  background-image: url("../images/banner rồng2.jpg");
  background-size: cover;
  height: 710px;
  /*chỉnh size banner*/
  margin-top: 40px;
  display: flex;
  padding: 0px 133px;
  position: relative;
  transform: translateY(+10%);
  border-radius: 12px;
  box-shadow: 4px 4px 4px #666;
}

#banner2 .box-left,
#banner .box-right {
  width: 50%;
  margin-top: 10px;
}

#banner2 .box-left h2 {
  /* chỉnh chữ spring of the Y*/

  font-size: 50px;
  margin-top: 55px;
  margin-left: 409px;
  width: 100%;
  padding: 0px 30px;
  font-family: Tahoma;
  color: #AE611D
}

#banner2 .box-left button {
  /*nút buttom mua ngay*/
  font-size: 20px;
  /*chỉnh size chữ*/
  width: 170px;
  /*chỉnh size dài bóng đen*/
  height: 45px;
  /*chỉnh size rộng bóng đen*/
  margin-top: 460px;
  /*chỉnh vị trí buttom lên xuống*/
  margin-left: 565px;
  /*chỉnh vị trí buttom trái phải*/
  background: #1d1a1a;
  border: none;
  outline: none;
  color: #fff;
  font-weight: bold;
  border-radius: 200px;
  transition: 0.4s;
  /*chỉnh tốc độ chuyển màu*/
}

#banner2 .box-left button:hover {
  /*màu sắc khi nhấp vô nút buttom mua ngay*/
  background: orange;
}


/* ------------------------Banner LILIWUYN------------------------------*/
#banner3 {
  /* banner lilywuyn*/
  width: 100%;
  background-image: url("../images/banner liliwuyn2.jpg");
  background-size: cover;
  height: 550px;
  /*chỉnh size banner*/
  margin-top: -40px;
  display: flex;
  padding: 0px 133px;
  position: relative;
  transform: translateY(+10px);
  border-radius: 12px;
  margin-top: 5%;
  box-shadow: 3px 3px 5px 0px #666;
}

#banner3 .box-left,
#banner .box-right {
  width: 50%;

}

#banner3 .box-left button {
  /*nút buttom mua ngay*/
  font-size: 20px;
  /*chỉnh size chữ*/
  width: 170px;
  /*chỉnh size dài bóng đen*/
  height: 45px;
  /*chỉnh size rộng bóng đen*/
  margin-top: 435px;
  /*chỉnh vị trí buttom lên xuống*/
  margin-left: 565px;
  /*chỉnh vị trí buttom trái phải*/
  background: #1d1a1a;
  border: none;
  outline: none;
  color: #fff;
  font-weight: bold;
  border-radius: 200px;
  transition: 0.4s;
  /*chỉnh tốc độ chuyển màu*/
  transform: translateY(+30%)
}

#banner3 .box-left button:hover {
  /*màu sắc khi nhấp vô nút buttom mua ngay*/
  background: orange;
}



/* ------------------------WHAT'S HOT------------------------------*/

#slider {
  position: relative;
  width: 50%;
  height: 32vw;
  margin: 88px auto;
  transform-style: preserve-3d;
  font-family: "Helvetica Neue", sans-serif;
  perspective: 1400px;
  transform: translateY(-30%);
}

#slide {
  position: relative;
  width: 50%;
  height: 32vw;
  margin: 88px auto;
  transform-style: preserve-3d;
  font-family: "Helvetica Neue", sans-serif;
  perspective: 1400px;
  transform: translateY(+5%);
}

#box1 {
  transform: translateY(-140px);
}

#box2 {
  transform: translateY(+30px);
}



input[type="radio"] {
  position: relative;
  top: 108%;
  left: 50%;
  width: 18px;
  height: 18px;
  margin: 0 15px 0 0;
  transform: translateX(-83px);
  cursor: pointer;
  opacity: 0.4;
}

input[type="radio"]:nth-child(5) {
  margin-right: 0px;
}

input[type="radio"]:checked {
  opacity: 1;
}

#slider label,
#slider label img {
  display: flex;
  position: absolute;
  top: 0;
  left: 0;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  border-radius: 6px;
  color: #fff;
  font-size: 70px;
  font-weight: bold;
  cursor: pointer;
  transition: transform 300ms ease;
}

#slide label,
#slide label img {
  display: flex;
  position: absolute;
  top: 0;
  left: 0;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  border-radius: 6px;
  color: #fff;
  font-size: 70px;
  font-weight: bold;
  cursor: pointer;
  transition: transform 300ms ease;
}

#s1:checked~#slider1,
#s2:checked~#slider2,
#s3:checked~#slider3,
#s4:checked~#slider4,
#s5:checked~#slider5 {
  transform: translate3d(0%, 0, 0px);
  box-shadow: 0 13px 26px rgba(0, 0, 0, 0.3), 0 12px 6px rgba(0, 0, 0, 0.2);
}

#s1:checked~#slider2,
#s2:checked~#slider3,
#s3:checked~#slider4,
#s4:checked~#slider5,
#s5:checked~#slider1 {
  transform: translate3d(20%, 0, -100px);
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3), 0 2px 2px rgba(0, 0, 0, 0.3);
}

#s1:checked~#slider5,
#s2:checked~#slider1,
#s3:checked~#slider2,
#s4:checked~#slider3,
#s5:checked~#slider4 {
  transform: translate3d(-20%, 0, -100px);
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3), 0 2px 2px rgba(0, 0, 0, 0.2);
}

#s1:checked~#slider3,
#s2:checked~#slider4,
#s3:checked~#slider5,
#s4:checked~#slider1,
#s5:checked~#slider2 {
  transform: translate3d(40%, 0, -250px);
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

#s1:checked~#slider4,
#s2:checked~#slider5,
#s3:checked~#slider1,
#s4:checked~#slider2,
#s5:checked~#slider3 {
  transform: translate3d(-40%, 0, -250px);
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

#s21:checked~#slide1,
#s22:checked~#slide2,
#s23:checked~#slide3,
#s24:checked~#slide4,
#s25:checked~#slide5 {
  transform: translate3d(0%, 0, 0px);
  box-shadow: 0 13px 26px rgba(0, 0, 0, 0.3), 0 12px 6px rgba(0, 0, 0, 0.2);
}

#s21:checked~#slide2,
#s22:checked~#slide3,
#s23:checked~#slide4,
#s24:checked~#slide5,
#s25:checked~#slide1 {
  transform: translate3d(20%, 0, -100px);
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3), 0 2px 2px rgba(0, 0, 0, 0.3);
}

#s21:checked~#slide5,
#s22:checked~#slide1,
#s23:checked~#slide2,
#s24:checked~#slide3,
#s25:checked~#slide4 {
  transform: translate3d(-20%, 0, -100px);
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3), 0 2px 2px rgba(0, 0, 0, 0.2);
}

#s21:checked~#slide3,
#s22:checked~#slide4,
#s23:checked~#slide5,
#s24:checked~#slide1,
#s25:checked~#slide2 {
  transform: translate3d(40%, 0, -250px);
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

#s21:checked~#slide4,
#s22:checked~#slide5,
#s23:checked~#slide1,
#s24:checked~#slide2,
#s25:checked~#slide3 {
  transform: translate3d(-40%, 0, -250px);
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

:root {
  --bgColor: rgb(255, 252, 241);
}

#box2left {
  transform: translateY(+160px);
}

#imgbox3 {
  transform: translate(+165%, +63%);
  border-radius: 12px;

}

#imgbox3:hover {
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
}

#boxname {
  width: 80%;
  transform: translate(240px, 640px);
}

#btn4 {
  transform: translate(750px, -200px);
}

#new {
  /*căn nguyên lish new arrival và sản phẩm */
  padding-top: 50px;
  /*cách banner trên*/
  padding-bottom: 78px;
  padding-left: 0px;
  padding-right: 160px;
  /*căn phải với web*/

}

#new h2 {
  padding-left: 175px;
  text-align: center;
  margin-bottom: 50px;
  /*căn trên so với chữ WHAT'S HOT*/
  font-size: 25px;
  /*size chữ WHAT'S HOT*/
  color: black;

}


#list-new {
  font-size: 13px;
  /*size chữ sản phẩm*/
  display: flex;
  list-style: none;
  justify-content: space-around;
  align-items: center;
  flex-wrap: wrap;
}

#list-new .item {
  width: 100%;
  /*căn trái phải của hình ảnh so với lề*/
  height: 0px;
  /*chỉnh khung border sau ảnh*/
  background: #fafafa;
  border-radius: 0px;
  margin-bottom: 460px;
  /*chỉnh khoảng cách sản phẩm trên so với sản phẩm dưới*/
}


#list-new .item .name {
  text-align: center;
  color: rgb(10, 10, 10);
  font-weight: bold;
  margin-top: 20px;
  /*chỉnh khoảng cách từ tên so với sản phẩm*/
}


.list-page {
  width: 50%;
  margin: 0px auto;
}

.list-page {
  display: flex;
  list-style: none;
  justify-content: center;
  align-items: center;
}

#list-new .box-left {
  text-align: center;
  margin-top: 470px;
  /*chỉnh lên xuống nút xem thêm */
  margin-left: -458px;
  /*chỉnh trái phải nút xem thêm*/

}

#list-new .box-left button:hover {
  /*màu sắc khi nhấp vô nút buttom mua ngay*/
  background: orange;
}

#list-new .box-left button {
  /*nút buttom mua ngay*/
  font-size: 13px;
  /*chỉnh size chữ*/
  width: 90px;
  /*chỉnh size dài bóng đen*/
  height: 35px;
  /*chỉnh size rộng bóng đen*/
  background: #1d1a1a;
  border: none;
  outline: none;
  color: #fff;
  font-weight: bold;
  border-radius: 200px;
  transition: 0.4s;
  /*chỉnh tốc độ chuyển màu*/
}



/* ------------------------Banner 4------------------------------*/
#banner4 {
  /* banner sale off*/
  width: 100%;
  background-image: url("../images/banner saleoff2.jpg");
  background-size: cover;
  height: 113px;
  /*chỉnh size banner*/
  margin-top: -20px;
  margin-left: 0px;
  display: flex;
  padding: 0px 133px;
  position: relative;
  transform: translateY(+200px);
}

#banner4 .box-left,
#banner .box-right {
  width: 50%;
}

#banner4 .box-left button {
  /*nút buttom mua ngay*/
  font-size: 15px;
  /*chỉnh size chữ*/
  width: 190px;
  /*chỉnh size dài bóng đen*/
  height: 55px;
  /*chỉnh size rộng bóng đen*/
  margin-top: 27px;
  /*chỉnh vị trí buttom lên xuống*/
  margin-left: 670px;
  /*chỉnh vị trí buttom trái phải*/
  background: #1d1a1a;
  border: none;
  outline: none;
  color: #fff;
  font-weight: bold;
  border-radius: 200px;
  transition: 0.4s;
}

#banner4 .box-left button:hover {
  /*màu sắc khi nhấp vô nút buttom mua ngay*/
  background: orange;
}

/*@media screen and (max-width: 870px) and (min-width:300px) {*/
/*  body {*/
/*    width: 1600px;*/
/*  }*/

/*}*/







/*--------------------------product detail-----------------------*/
#prodetails {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;

}

#prodetails .single-pro-image {
  margin-right: 50px;
  margin-top: 40px;
  margin-left: 50px;
}

#prodetails .small-img-group {
  display: flex;
  width: 100%;
}

#prodetails .small-img-col{
  cursor: pointer;
  margin-right: 10px;
}

#prodetails .single-pro-details {
  width: 100%;
  padding: 50px 50px;
}

#prodetails .description{
  text-align: justify;
}
#prodetails .single-pro-details input {
  width: 50px;
  height: 47px;
  padding-left: 10px;
  font-size: 16px;
  margin-right: 10px;
}

#prodetails .single-pro-details input:focus {
  outline: none;
}

#prodetails .single-pro-details span {
  line-height: 25px;
}

#prodetails .product_price {
  color: red;
}

/*input number*/
input[type='number']::-webkit-inner-spin-button,
input[type='number']::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.custom-number-input input:focus {
  outline: none !important;
}

.custom-number-input button:focus {
  outline: none !important;
}

/*button quantity*/
.btn_quantity {
  display: flex;
}
.quantity_btn {
  border: 1px solid grey;
  text-align: center;
  width: 40px;
  height: 40px;
  margin: 10px ;
  font-size: 25px;
  align-items: center;
}

button:hover {
  cursor: pointer;
}
.buy{
  display: inline-block;
}
#prodetails .add-cart {
  padding: 10px;
  color: white;
  background-color: #EE4D2D;
  border-radius: 4px;
  cursor: pointer;
  border: none;
  outline: none;
  transition: 0.2s;
  letter-spacing: 2px;
  display: inline-block;
}

#prodetails .add-cart:hover {
  opacity: 0.9;
}

#prodetails .buy-now {
  margin-top: 10px;
  padding: 10px 30px;
  color: #EE4D2D;
  background-color: #FFEEE8;
  border-radius: 4px;
  cursor: pointer;
  border: 1px solid #EE4D2D;
  outline: none;
  transition: 0.2s;
  letter-spacing: 2px;
  display: inline-block;
}


/*----------------------------------phan trang--------------------------*/

nav .pagination {
  align-items: center;
  padding-top: 2rem;
  justify-content: center;
}

nav .pagination ul {
  display: flex;
  list-style: none;
}

nav .pagination ul li {
  background-color: rgb(0, 124, 29);
  margin: 0px 5px;
  border-radius: 2px;
  padding: 5px;
}

nav .pagination ul li a {
  padding: 20px 10px;
  color: white;
  font-weight: 500;
}
nav .pagination ul li a:hover,
nav .pagination ul li a:active{
  color: red;
}
  /*--------------------------end phan trang-------------------------------*/







/*----------------------------footer-------------------------*/
footer{
  background: black;
  transform: translateY(+200px);
  width: 100%;
  color: white ;
}

footer .footer {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 20px 20px 20px 20px;
}

footer .col-md-4{
  margin-top: 30px;
}

.footer h4 {
  font-size: 20px;
  padding-bottom: 12px;
  padding-top: 12px;
  font-weight: 700;
}

.footer p {
  margin-top: 10px;
  font-size: 15px;
}

.footer a {
  font-size: 15px;
  text-decoration: none;
  color: white;
  margin-bottom: 10px;
}

.footer iframe {
  width: 500px;
  height: 300px;
}

.footer i {
  margin-right:10px;
  font-size: 1.5em
}

        <?php
        if (isset($_SESSION['name'])) {
        ?>#box4 {
            opacity: 0;
        }
        <?php
        }else{
        ?>
        #box4 {
            opacity: 1;
        }
        <?php
        }
        ?>
        
    </style>