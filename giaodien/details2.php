<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
require_once('../database/connect.php');
require_once('../database/dbper.php');
require_once('../utily/utility.php');
// Lấy id từ trang index.php truyền sang rồi hiển thị nó
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = 'select * from product where id= '  . $id;
  $product = executeSingleResult($sql);
  // Kiểm tra nếu ko có id sp đó thì trả về index.php
  if ($product == null) {
    header('Location: index.php');
    die();
  }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
  <link rel="stylesheet" href="./login.css">
  <link rel="shortcut icon" type="image/png" href="/Project_shop_clothes/admin/product/uploads/avt3.png" />
  <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script><!--link lấy icon -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>Details</title>

</head>
<!-----------------------HEARDER ----------------------------------------->
<?php require_once('header.php') ?>
</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=264339598396676&autoLogAppEvents=1" nonce="8sTfFiF4"></script>
<!-- END HEADR -->
<main>
  <div class="conatainer" style="margin-left: 50px">
    <div style="padding-top: 100px;width:1300px;" id="ant-layout">
      <section class="search-quan">
        <i class="fas fa-search"></i>
        <form action="thucdon.php" method="GET">
          <input name="search" type="text" placeholder="Tìm đồ khác">
        </form>
      </section>
    </div>
</div>
    <!-- <div class="bg-grey">




        </div> -->
    <!-- END LAYOUT  -->
    <section class="main">
      <section class="oder-product">
        <div class="title">
         
<section id="prodetails" class="section-p1">

<div class="single-pro-image">

    <img class="thumbnail" src="../admin/product/<?php echo $product['thumbnail']; ?>" width="100%" id="MainImg">
    <div class="small-img-group">
        <div class="small-img-col">
            <img class="thumbnail small-img" src="../admin/product/<?php echo $product['thumbnail']; ?>" width="100%">
        </div>
        <div class="small-img-col">
            <img class="thumbnail small-img" src="../admin/product/<?php echo $product['thumbnail_1']; ?>" width="100%">
        </div>
        <div class="small-img-col">
            <img class="thumbnail small-img" src="../admin/product/<?php echo $product['thumbnail_2']; ?>" width="100%">
        </div>
        <div class="small-img-col">
            <img class="thumbnail small-img" src="../admin/product/<?php echo $product['thumbnail_3']; ?>" width="100%">
        </div>
        <div class="small-img-col">
            <img class="thumbnail small-img" src="../admin/product/<?php echo $product['thumbnail_4']; ?>" width="100%">
        </div>
        <div class="small-img-col">
            <img class="thumbnail small-img" src="../admin/product/<?php echo $product['thumbnail_5']; ?>" width="100%">
        </div>
    </div>
    <div >
    <button class="review"><a href="../rating/my_rating.php?product_id=<?php echo $id; ?>&username=<?php echo $_SESSION['username'] ?>">Evaluate <i class="fa-sharp fa-regular fa-comments"></i></a></button>

    </div>
</div>
<script>
    var MainImg = document.getElementById("MainImg");
    var smallimg = document.getElementsByClassName("small-img");

    smallimg[0].onclick = function () {
        MainImg.src = smallimg[0].src;
    }
    smallimg[1].onclick = function () {
        MainImg.src = smallimg[1].src;
    }
    smallimg[2].onclick = function () {
        MainImg.src = smallimg[2].src;
    }
    smallimg[3].onclick = function () {
        MainImg.src = smallimg[3].src;
    }
    smallimg[4].onclick = function () {
        MainImg.src = smallimg[4].src;
    }
    smallimg[5].onclick = function () {
        MainImg.src = smallimg[5].src;
    }
</script>

<div class="single-pro-details">
    <p class="product_name">
        <?php echo $product['title']; ?>
    </p>
    <p class="product_price"><span>
                <?= number_format($product['price'], 0, ',', '.') ?> VND
            </span></p>


    
 <div class="about">
                <div id="myDIV" style="padding-top:10px;margin-left:10px;">
                  <button class="btn">S</button>
                  <button class="btn active">M</button>
                  <button class="btn">L</button>

                </div>
                <script>
                  // Add active class to the current button (highlight it)
                  var header = document.getElementById("myDIV");
                  var btns = header.getElementsByClassName("btn");
                  for (var i = 0; i < btns.length; i++) {
                    btns[i].addEventListener("click", function() {
                      var current = document.getElementsByClassName("active");
                      current[0].className = current[0].className.replace(" active", "");
                      this.className += " active";
                    });
                  }
                </script>

                <script>
                  function updatePrice() {
                    var price = document.getElementById('price').innerText; // giá tiền
                    var num = document.querySelector('#num').value; // số lượng
                    var gia1 = document.querySelector('.gia').innerText;
                    var gia = price.match(/\d/g);
                    gia = gia.join("");
                    var tong = gia1 * num;
                    document.getElementById('price').innerHTML = tong.toLocaleString();
                  }

                  function addToCart(id) {
                    var num = document.getElementById("num").value; // số lượng
                    $.post('/Project_shop_clothes/cart/cookie.php', {
                      'action': 'add',
                      'id': id,
                      'num': num
                    }, function(data) {
                      location.reload()
                    })
                  }

                  function buyNow(id) {

                    $.post('/Project_shop_clothes/cart/cookie.php', {
                      'action': 'add',
                      'id': id,
                      'num': 1
                    }, function(data) {
                      location.assign("../cart/checkout.php");
                    })
                  }
                </script>

                <div class="number" style=" width:100px;padding-top:10px;margin-left:10px;">
                  <span class="number-buy">Số lượng:</span>
                  <input style="width:220px" id="num" type="number" value="1" min="1" onchange="updatePrice()">
                </div>

                <!-- <a class="add-cart" href="" onclick="addToCart()"><i class="fas fa-cart-plus"></i>Thêm vào giỏ hàng</a> -->
                <button class="add-cart" style="margin-left:10px;" onclick="addToCart(<?= $id ?>)"><i class="fas fa-cart-plus"></i>Thêm vào giỏ hàng</button>
                <!-- <a class="buy-now" href="checkout.php" >Mua ngay</a> -->
                <button class="buy-now" style="width:225px;margin-left:10px;" onclick="buyNow(<?= $id ?>)">Mua ngay</button>
              </div>


    <div style="width: 500px">
      <h4>Product Details</h4>
    <span>
            <?php echo $product['content']; ?>
        </span>
    </div>
    
</div>

</section>
        </div>
      </section>
      <section class="restaurants container">
        <div class="title">
          <h1>Các sản phẩm khác tại DI<span class="green" style="color: red;">CO</span></h1>
        </div>
        <div class="product-restaurants">
          <div class="row">
            <?php
            $sql = 'select * from product,report where type_clothes ="quan"  AND product.id=report.id_report';
            $productList = executeResult($sql);
            $index = 1;
            foreach ($productList as $item) {
              echo '
                                <div class="col">
                                    <a href="details2.php?id=' . $item['id'] . '">
                                        <img class="thumbnail" src="../admin/product/' . $item['thumbnail'] . '" alt="">
                                        <table>
                                        <tr rowspan="2">
                                        <div class="title">
                                            <p class ="title2">' . $item['title'] . '</p>
                                        </div>
                                        </tr>
                                        <tr>
                                        <div class="price">
                                            <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
                                        </div>
                                        </tr>
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
                                        </table>
                                    </a>
                                </div>
                                ';
            }

            ?>

          </div>
        </div>
      </section>
    </section>
  </div>
</main>

</div>

</body>
<style>
   /* single product */
        #prodetails {
            display: flex;
            margin-top: 100px;
            margin-bottom: 100px;
        }

        #prodetails .single-pro-image {
            width: 40%;
            margin-right: 120px;
            margin-top: 40px;
            margin-left: 150px;
        }

        .small-img-group {
            display: flex;
            justify-content: space-between;
        }

        .small-img-col {
            flex-basis: 24%;
            cursor: pointer;
        }

        #prodetails .single-pro-details {
            width: 50%;
            padding-top: 30px;
            margin-right: 100px;
        }

        #prodetails .single-pro-details h4 {
            padding: 40px 0 20px 0;
        }

        #prodetails .single-pro-details h2 {
            font-size: 26px;
        }

        #prodetails .single-pro-details select {
            display: block;
            padding: 5px 10px;
            margin-bottom: 10px;
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

        .product_name {
            font-size: 22px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .product_price {
            color: red;
            font-size: 30px;

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
            margin: 7px 5px;
            font-size: 25px;
            align-items: center;

        }

        button:hover {
            cursor: pointer;
        }
  .btn {
    border: none;
    outline: none;
    background-color: #fffefe;
    border: 2px solid #c2c2c2;
    color: black;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    width: 70px;

  }

  /* Style the active class, and buttons on mouse-over */
  .active,
  .btn:hover {
    border: 2px solid #000000;
  }

  .title2 {
    width: 200px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    overflow: hidden;

  }

  <?php
  if (isset($_SESSION['username'])) {
  ?>button.review {
    opacity: 1;
  }

  <?php
  } elseif (!isset($_SESSION['username'])) {
  ?>button.review {
    opacity: 0;
  }

  <?php
  }
  ?>
  .review {
    background-color: aqua;
    
    border-radius: 12px;
    width: 200px;
    height: 50px;
    transform: translate(+150px,+80px);
  }
  .review a {
    color: #676767;
  }
  .about .option {
    width: 800px;
    width: 700px;
  }

  input[type="number"] {
    width: 20px;
  }



  section.main section.oder-product {
    display: grid;
    grid-template-columns: auto -10%;

  }


  section.main section.oder-product .link a {
    text-decoration: none;
    color: black;
    font-size: 20px;
  }

  section.main section.oder-product .title h1 {
    font-size: 35px;
    font-family: 'Encode Sans SC', sans-serif;
    margin: 0px;
    padding: 0px;
    color: black;
    padding: 30px;
  }

  section.main section.oder-product .title .main-order .box {
    display: flex;
  }

  section.main section.oder-product .title .main-order .box img {
    width: 100%;
    word-break: break-all;
  }

  section.main section.oder-product .title .main-order .box .about p {
    font-size: 17px;
    color: rgb(44, 38, 38);
    font-weight: 500;
  }

  section.main section.oder-product .title .main-order .box .about .size {
    display: flex;
  }

  section.main section.oder-product .title .main-order .box .about .size p {
    font-weight: 500;
  }

  section.main section.oder-product .title .main-order .box .about .size ul {
    display: flex;
    list-style: none;
  }

  section.main section.oder-product .title .main-order .box .about .size ul li a {
    padding: 5px 10px;
    border: 1px solid;
    margin: 0 5px;
    text-decoration: none;
    color: black;
  }



  section.main section.oder-product .title .main-order .box .about .number .number-buy {
    font-weight: 500;
    font-size: 20px;
  }

  section.main section.oder-product .title .main-order .box .about .price {
    font-weight: 500;
  }

  section.main section.oder-product .title .main-order .box .about .price .none {
    display: none;
  }

  section.main section.oder-product .title .main-order .box .about .price span {
    color: red;
    font-weight: 600;
  }

.buy-now {
    /* padding: 13px 30px;
    background-color: rgb(255, 0, 0);
    border-radius: 3px;
    color: white;
    border: none; */
    padding: 15px 30px;
    color: #EE4D2D;
    background-color: #FFEEE8;
    border-radius: 4px;
    cursor: pointer;
    border: 1px solid #EE4D2D;
    outline: none;
    transition: 0.2s;
    letter-spacing: 2px;
    transform: translateY(+100);
  }

  section.main section.oder-product .title .main-order .box .about .buy-now:hover {
    cursor: pointer;
    opacity: 0.8;
  }

  .add-cart {
    /* padding: 13px 30px;
    background-color: rgba(255, 68, 35, 0.856);
    border-radius: 3px;
    color: white;
    border: none; */
    padding: 15px ;
        color: white;
        background-color: #EE4D2D;
        border-radius: 4px;
        cursor: pointer;
        border: none;
        outline: none;
        transition: 0.2s;
        letter-spacing: 2px;
        margin-top: 20px;
  }

  section.main section.oder-product .title .main-order .box .about .add-cart i {
    padding: 0 5px;
  }

  section.main section.oder-product .title .main-order .box .about .add-cart:hover {
    cursor: pointer;
    opacity: 0.8;
  }

  /* END SẢN PHẨM  */
  aside h1 {
    font-size: 30px;
    margin: 0px;
    padding: 0px;
    padding-left: 40px;
  }

  aside .row {
    display: flex;
    flex-flow: column;
    padding-left: 40px;

  }

  aside .row .col {
    border: 1px solid grey;
    margin: 20px 0px 5px 0px;
    border-radius: 5px;

  }

  aside .row .col a {
    display: flex;
  }

  aside .row .col img {
    width: 50%;
  }

  aside .row .col a .about .title {
    color: black;
  }

  aside .row .col a .about .title p {
    padding: 0;
    margin-top: 5px;
    font-weight: 600;
    font-size: 20px;
    font-family: 'Encode Sans SC', sans-serif;
  }

  aside .row .col a .about .title span {
    font-weight: bold;
    color: red;
    font-family: 'Bebas Neue', cursive;
  }

  /* END Gợi ý cho bạn */
  section.comment {
    margin: 5rem 0;
    border-top: 1px solid black;
  }

  section.comment .container {
    display: grid;
    grid-template-columns: auto 30%;
  }

  section.comment .container .post {
    display: flex;
    flex-flow: column;
  }

  body {
    margin: 0px;
    padding: 0px;
    font-family: SanomatGrabApp, -apple-system, BlinkMacSystemFont, Segoe UI,
      PingFang SC, Hiragino Sans GB, Microsoft YaHei, Helvetica Neue, Helvetica,
      Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
  }

  #wrapper {
    width: 100%;
    margin: 0 auto;
  }

  #wrapper header {
    width: 100%;
    margin: 0px auto;
    /* background-color: rgb(170, 255, 227); */
    padding: 10px 0;
  }

  #wrapper header .container {
    width: 90%;
    margin: 0px auto;
    /* display: flex; */
    /* justify-content: space-between;
  align-items: center; */
    display: grid;
    grid-template-columns: 20% auto auto;
  }

  header section.logo {
    display: flex;
    align-items: center;
  }

  header section.logo a img {
    width: 60%;

  }

  #wrapper header .container nav {
    text-align: left;
  }

  #wrapper header .container nav ul {
    display: flex;
  }

  #wrapper header .container nav ul li {
    padding: 10px;
    list-style: none;
  }

  #wrapper header .container nav ul li a {
    text-decoration: none;
    color: rgb(43, 38, 38);
    padding: 10px;
    /* background-color: #f7f7f7; */
    text-transform: uppercase;
    font-weight: 700;
    font-family: Muli, Futura, Helvetica, Arial, sans-serif;
    position: relative;

  }

  #wrapper header .container nav ul li a::after {
    content: "";
    position: absolute;
    bottom: 10px;
    left: 0px;
    height: 3px;
    width: 100%;
    background-color: #00b14f;
    display: none;
  }

  #wrapper header .container nav ul li a:hover:after {
    display: block;
  }

  /* MENU CON - CHA  */
  #wrapper header .container nav ul li.nav-cha {
    position: relative;
    transition: all 0.4s;

  }

  #wrapper header .container nav ul li ul {
    position: absolute;
    display: flex;
    flex-flow: column;
    left: 0;
    top: 35px;
    width: 150%;
    background-color: rgb(255, 255, 255);
    box-shadow: 0px 0px 5px 0px rgb(212, 212, 212);
    z-index: 100;
    padding: 0;
    border-radius: 5px;
  }

  #wrapper header .container nav ul li ul li {
    text-align: center;
    padding: 10px 0px;
    display: none;
    transition: all 0.4s;

  }

  #wrapper header .container nav ul li ul li a {
    text-decoration: none;
    margin: 10px 0;
    color: black;
    font-weight: bold;
  }

  #wrapper header .container nav ul li.nav-cha:hover ul li {
    display: block;
  }

  /* MENU CON - CHA  */

  #wrapper header .container section.menu-right {
    display: flex;
    align-items: center;
  }

  #wrapper header .container section.menu-right .cart {
    padding: 5px;
    border: 1px solid rgb(196, 196, 196);
    border-radius: 3px;
    margin: 0 10px;
    position: relative;
  }

  #wrapper header .container section.menu-right .cart span {
    position: absolute;
    top: 0px;
    right: 0;
    font-weight: 500;
    color: rgb(122, 115, 115);
  }

  #wrapper header .container section.menu-right .cart:hover {
    box-shadow: 0px 0px 3px 0px grey;
    cursor: pointer;
  }

  #wrapper header .container section.menu-right .cart:hover .history {
    opacity: 1;
  }

  #wrapper header .container section.menu-right .cart a {
    padding: 5px;
    text-decoration: none;
  }

  #wrapper header .container section.menu-right .cart .history {
    transition: all 0.5s;
    opacity: 0;
    margin-top: 0.7rem;
    display: flex;
    text-align: center;
    flex-flow: column;
    padding: 5px 0;
    border-radius: 10%;
    width: 100px;
    position: absolute;
    left: -75%;
    top: 1.3rem;
    z-index: 10;
  }

  #wrapper header .container section.menu-right .cart .history a {
    font-weight: 600;
    color: black;
  }

  #wrapper header .container section.menu-right .cart .history a:hover {
    color: rgb(41, 39, 39);
  }

  #wrapper header .container section.menu-right .login {
    padding: 7px;
    border: 1px solid rgb(196, 196, 196);
    border-radius: 3px;
    margin: 0 10px;
    position: relative;
  }

  #wrapper header .container section.menu-right .login:hover {
    box-shadow: 0px 0px 3px 0px grey;
    cursor: pointer;
  }

  #wrapper header .container section.menu-right .login a {
    padding: 5px;
    text-decoration: none;
    color: #676767;
    font-weight: 500;
  }

  #wrapper header .container section.menu-right .login:hover .logout {
    display: block;
  }

  #wrapper header .container section.menu-right .login .logout {
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

  #wrapper header .container section.menu-right .login .logout a {
    color: black;
    font-weight: 500;
    border-radius: 5px;
    margin: 10px 0;
  }

  #wrapper header .container section.menu-right .login .logout a:hover {
    opacity: 0.8;
  }

  /* END HEADER  */
  main .container {
    width: 90%;
    margin: 0px auto;
  }

  main section.search-quan {
    width: 100%;
    margin: 0px auto;
    position: relative;
    display: flex;
    justify-content: center;
  }

  main section.search-quan i {
    position: absolute;
    left: 2%;
    top: 50%;
    transform: translateY(-50%);
    color: #676767;
  }

  main section.search-quan form {
    width: 100%;
  }

  main section.search-quan input {
    width: 90%;
    padding: 15px 50px;
    border-radius: 10px;
    outline: 0;
    border: 0;
    background-color: #f7f7f7;
  }

  /* END MAIN TOP  */
  main #ant-layout section.main-layout {
    padding: 2rem 0;
    margin: 0px auto;
    width: 100%;
  }

  main #ant-layout section.main-layout .row {
    display: grid;
    grid-template-columns: auto auto auto auto auto auto;
    grid-column-gap: 10px;
  }

  main #ant-layout section.main-layout .row .box a {
    text-decoration: none;
  }

  main #ant-layout section.main-layout .row .box:hover {
    filter: drop-shadow(8px 5px 10px gray);
  }

  main #ant-layout section.main-layout .row .box {
    position: relative;
  }

  main #ant-layout section.main-layout .row .box p {
    position: absolute;
    z-index: 2;
    left: 50%;
    top: 25%;
    transform: translateX(-50%);
    color: white;
    font-weight: bold;
    font-size: 18px;
  }

  main #ant-layout section.main-layout .row .box .bg {
    background-color: rgba(0, 0, 0, 0.4);
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: 1;
    display: block;
    border-radius: 5px;
  }

  main #ant-layout section.main-layout .row img {
    width: 100%;
    height: 100%;
    border-radius: 5px;
    /* filter:drop-shadow(8px 5px 10px gray); */
  }

  .bg-grey {
    background-color: #f7f7f7;
    height: 10px;
    border-radius: 3px;
  }

  /* <!-- END LAYOUT  --> */

  section.main {
    padding: 2rem 0;
    width: 100%;
    margin: 0px auto;
  }

  section.main a {
    text-decoration: none;
  }

  section.main section.recently {
    padding-bottom: 1rem;
  }

  section.main section.recently .link a {
    text-decoration: none;
    color: black;
    font-size: 20px;
  }

  section.main section.recently .title h1 {
    font-size: 35px;
    margin: 0px;
    padding: 0px;
    color: black;
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

  /* end mon ngon gần bạn  */

  section.main section.restaurants {
    padding: 3rem 0;
  }

  section.main section.restaurants .link a {
    text-decoration: none;
    color: black;
    font-size: 20px;
  }

  section.main section.restaurants .title h1 {
    font-size: 35px;
    margin: 0px;
    padding: 0px;
    color: black;
  }

  section.main section.restaurants .title h1 span {
    color: green;
  }

  section.main section.restaurants .product-restaurants {
    padding-top: 2rem;
  }

  section.main section.restaurants .product-restaurants .row {
    display: grid;
    grid-template-columns: auto auto auto auto;
    grid-column-gap: 30px;
    grid-row-gap: 30px;
  }

  section.main section.restaurants .product-restaurants .row .col img {
    width: 100%;
    border-radius: 10px;
  }

  section.main section.restaurants .product-restaurants .row .col img.thumbnail {
    border: 1px solid rgb(76, 78, 85);
    transition: 0.1s;
  }

  section.main section.restaurants .product-restaurants .row .col img.thumbnail:hover {
    box-shadow: 0px 0px 5px 0px grey;
  }

  section.main section.restaurants .product-restaurants .row .col .title p {
    font-size: 20px;
    font-weight: 600;
    padding: 0px;
    margin: 5px 0;
    color: rgb(43, 31, 31);
    font-family: "Encode Sans SC", sans-serif;
  }

  @import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap");
  @import url("https://fonts.googleapis.com/css2?family=Encode+Sans+SC:wght@500;600;700&display=swap");

  section.main section.restaurants .product-restaurants .row .col .price span {
    padding: 10px 0;
    color: #676767;
    font-size: 20px;
    font-weight: 600;
    color: rgba(207, 16, 16, 0.815);
    font-family: "Bebas Neue", cursive;
  }

  section.main section.restaurants .product-restaurants .row .col .more {
    display: flex;
    color: #676767;
    padding: 5px 0;
    font-size: 18px;
  }

  section.main section.restaurants .product-restaurants .row .col .more .star {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  section.main section.restaurants .product-restaurants .row .col .more .star img {
    width: 25px;
    height: 25px;
  }

  section.main section.restaurants .product-restaurants .row .col .more .time {
    display: flex;
    padding: 0 10px;
  }

  section.main section.restaurants .product-restaurants .row .col .more .time img {
    width: 24px;
    height: 24px;
  }

  .pagination {
    margin: 0px auto;
    padding-top: 2rem;
  }

  .pagination ul {
    display: flex;
    list-style: none;
    /* justify-content: center; */
  }

  .pagination ul li {
    background-color: rgb(0, 124, 29);
    margin: 0px 5px;
    border-radius: 2px;
    padding: 5px;
  }

  .pagination ul li a {
    padding: 20px 10px;
    color: white;
    font-weight: 500;
  }
</style>

</html>
<!--------------------FOOTER--------------------------- -->
<?php require_once('footer.php') ?>
<style>