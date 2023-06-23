<?php
require_once "../giaodien/header.php";
//if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
//    unset($_SESSION['submit']);
//    header('Location:index.php');
//}
if (isset( $_SESSION['user'])){
    $user = $_SESSION['user'];
}
$conn = mysqli_connect('localhost','root','12345678','shop_quanao');
?>
<?php
//header("content-type:text/html; charset=UTF-8");
//?>
<?php
require_once('../database/connect.php');
require_once('../database/dbper.php');
require_once('../utily/utility.php');
// Lấy id từ trang index.php truyền sang rồi hiển thị nó
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select * from product where id= '  . $id  ;
    $product = executeSingleResult($sql);
    $id_category = $product['id_category'];
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
    <title>Details</title>

</head>

<body>
<!--<div id="fb-root"></div>-->
<!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=264339598396676&autoLogAppEvents=1" nonce="8sTfFiF4"></script>-->

<div class="container">
    <div style="padding-top: 50px;" id="ant-layout">
        <div class="search-quan">
            <i class="fa-solid fa-magnifying-glass"></i>
            <form action="thucdon.php" method="GET">
                <input name="search" type="text" placeholder="Tìm đồ khác">
            </form>
        </div>
    </div>
</div>



            <section id="prodetails" class="container-fluid">

                <div class="row justify-content-center">
                    <div class="single-pro-image col-md-4">

                        <div class="mainImg">
                            <img class="" src="../admin/product/<?php echo $product['thumbnail']; ?>" width="100%" id="MainImg">

                        </div>
                        <div class="small-img-group">
                            <div class="small-img-col">
                                <img class=" small-img" src="../admin/product/<?php echo $product['thumbnail']; ?>" width="100%">
                            </div>
                            <div class="small-img-col">
                                <img class=" small-img" src="../admin/product/<?php echo $product['thumbnail_1']; ?>" width="100%">
                            </div>
                            <div class="small-img-col">
                                <img class=" small-img" src="../admin/product/<?php echo $product['thumbnail_2']; ?>" width="100%">
                            </div>
                            <div class="small-img-col">
                                <img class=" small-img" src="../admin/product/<?php echo $product['thumbnail_3']; ?>" width="100%">
                            </div>
                            <div class="small-img-col">
                                <img class=" small-img" src="../admin/product/<?php echo $product['thumbnail_4']; ?>" width="100%">
                            </div>
                            <div class="small-img-col">
                                <img class=" small-img" src="../admin/product/<?php echo $product['thumbnail_5']; ?>" width="100%">
                            </div>
                        </div>
                    </div>

                    <div class="single-pro-details col-md-5">
                        <h2 class="product_name"><?php echo $product['title']; ?></h2>
                        <h3 class="product_price"><span><?= number_format($product['price'], 0, ',', '.') ?> VND</span></h3>


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
                                btns[i].addEventListener("click", function () {
                                    var current = document.getElementsByClassName("active");
                                    current[0].className = current[0].className.replace(" active", "");
                                    this.className += " active";
                                });
                            }
                        </script>

                        <div class="btn_quantity">
                            <button onclick="decrement()" class="quantity_btn">-</button>
                            <input id="num" type="number" value="1" min="1" class="quantity_btn"
                                   style="width: 100px; height: 40px"  onchange="updatePrice()">
                            <button onclick="increment()" class="quantity_btn">+</button>
                        </div>

                        <div class="buy">
                            <!-- <a class="add-cart" href="" onclick="addToCart()"><i class="fas fa-cart-plus"></i>Thêm vào giỏ hàng</a> -->
                            <button class="add-cart" style="margin-left:10px;" onclick="addToCart(<?= $id ?>)"><i class="fas fa-cart-plus"></i>Add to Cart</button>
                            <!-- <a class="buy-now" href="checkout.php" >Mua ngay</a> -->
                            <button class="buy-now" style="margin-left:10px;" onclick="buyNow(<?= $id ?>)">Buy Now</button>

                        </div>


<!--                        <a href="../rating/my_rating.php?product_id=--><?php //echo $id; ?><!--&username=--><?php //echo $user['tendangnhap'] ?><!--">Review product</a>-->
                        <h4 style="margin: 20px 0;">Product Details</h4>
                        <div class="description"><?php echo $product['content']; ?></div>
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



            </section>

<script>
    function increment() {
        document.getElementById('num').stepUp();
    }
    function decrement() {
        document.getElementById('num').stepDown();
    }

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



                <section class="main">
                    <section class="recently" style="padding-bottom: 50px;">
                        <div class="title">
                            <h1>Các sản phẩm khác tại DI<span class="green" style="color: red;">CO</span></h1>
                        </div>
                        <div class="product-recently">
                            <div class="row">
                                <?php
                                $sql = "select * from product where id_category = '$id_category' and id != '$id' limit 4";
                                $productList = executeResult($sql);
                                $index = 1;
                                $rating_number = 0;
                                $count = 0;

                                foreach ($productList as $item) {
                                    $sql3 = "SELECT SUM(rating_number) as sum FROM rating WHERE product_id =".$item['id'];
                                    $sql5 = "SELECT COUNT(rating_number) as count FROM rating WHERE product_id =".$item['id'];
                                    $res3 = mysqli_query($conn, $sql3);
                                    $res5 = mysqli_query($conn,$sql5);
                                    $average = 0;
                                    $sql4 = "SELECT  *FROM rating WHERE comment !='' AND product_id =" . $item['id'];
                                    $res4 = mysqli_query($conn, $sql4);
                                    $count_comment = mysqli_num_rows($res4);
                                    if ($res3->num_rows > 0 && $res5->num_rows >0){
                                        $row = $res3->fetch_assoc();
                                        $count5 = $res5->fetch_assoc();
                                        if ($count5['count'] > 0) {
                                            $average = $row['sum'] / $count5['count'];
                                        }else{
                                            $average = 0;
                                        }
                                    }
                                    $num_rating = number_format($average, 1, '.', '');

                                    ?>
                                    <div class="col">
                                        <a href="details.php?id=<?php echo $item['id']; ?>">
                                            <img class="thumbnail" src="../admin/product/<?php echo $item['thumbnail'] ?>" alt="">
                                            <div class="title">
                                                <p class ="title2"><?php echo $item['title'] ?></p>
                                            </div>
                                            <div class="price">
                                                <span><?php echo number_format($item['price'], 0, ',', '.')?> VNĐ</span>
                                            </div>
                                            <div class="more">
                                                <div class="star">
                                                    <img src="../images/icon/icon-star.svg" alt="">
                                                    <span><?php echo $num_rating; ?></span>
                                                </div>
                                                <div class="time">
                                                    <img src="../images/icon/icon-clock.svg" alt="">
                                                    <span><?php echo $count_comment; ?> comment</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </section>
                </section>

<hr>
<h2 style="margin-left: 50px">Rating and Reviews</h2>

<section style="margin: 50px  100px" class="row">
    <hr style="border-top: 1px solid #eee; margin-bottom: 50px">
    <?php
    //    $itemRating = getItemRating($itemId);
    $sql3 = "SELECT*FROM rating WHERE product_id = $id";
    $res3 = mysqli_query($conn, $sql3);
    $ratingNumber = 0;
    $count = 0;
    foreach ($res3 as $itemRatingDetails) {
        $ratingNumber += $itemRatingDetails['rating_number'];
        $count += 1;
    }
    $average = 0;
    if ($ratingNumber && $count) {
        $average = $ratingNumber / $count;
    }
    //    return $average;
    ?>
    <div class="col-sm-3">
        <h1>
            <?php echo number_format($average,1,'.',''); ?> <small>/ 5</small>
        </h1>
        <?php
        $averageRating = round($average, 0);
        for ($i = 1; $i <= 5; $i++) {
            $ratingClass = "fa-solid fa-star";
            $ratingColor = "#d7dadf";

            if ($i <= $averageRating) {
                $ratingClass = "fa-solid fa-star";
                $ratingColor = "#ffc800";
            }
            ?>
            <div class="inner">
                <i class="<?php echo $ratingClass; ?>" style="color: <?php echo $ratingColor; ?>;font-size: 30px"
                   aria-label="Left Align"></i>
            </div>

        <?php } ?>
    </div>

    <div  class="col-sm-3">
        <?php
        $ratingNumber = 0;
        $count = 0;
        $rate5 = 0;
        $rate4 = 0;
        $rate3 = 0;
        $rate2 = 0;
        $rate1 = 0;
        foreach ($res3 as $rate) {
            $ratingNumber += $rate['rating_number'];
            $count += 1;
            if ($rate['rating_number'] == 5) {
                $rate5 += 1;
            } else if ($rate['rating_number'] == 4) {
                $rate4 += 1;
            } else if ($rate['rating_number'] == 3) {
                $rate3 += 1;
            } else if ($rate['rating_number'] == 2) {
                $rate2 += 1;
            } else if ($rate['rating_number'] == 1) {
                $rate1 += 1;
            }
        }
        $average = 0;
        if ($ratingNumber && $count) {
            $average = $ratingNumber / $count;
        }
        ?>
        <?php
        $percent5 = round(($rate5 / 5) * 100);
        $percent5 = !empty($percent5) ? $percent5 . '%' : '0%';

        $percent4 = round(($rate4 / 5) * 100);
        $percent4 = !empty($percent4) ? $percent4 . '%' : '0%';

        $percent3 = round(($rate3 / 5) * 100);
        $percent3 = !empty($percent3) ? $percent3 . '%' : '0%';

        $percent2 = round(($rate2 / 5) * 100);
        $percent2 = !empty($percent2) ? $percent2 . '%' : '0%';

        $percent1 = round(($rate1 / 5) * 100);
        $percent1 = !empty($percent1) ? $percent1 . '%' : '0%';

        ?>
        <div class="fa-pull-left">
            <div class="fa-pull-left">5 <i class="fa-solid fa-star"></i></div>
            <div class="progress fa-pull-left" style="width: 180px">
                <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $percent5; ?>"></div>
            </div>
            <div class="fa-pull-left" style="margin-left:10px;">
                <?php echo $rate5; ?>
            </div>
        </div>
        <div class="fa-pull-left">
            <div class="fa-pull-left">4 <i class="fa-solid fa-star"></i></div>
            <div class="progress fa-pull-left" style="width: 180px">
                <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $percent4; ?>"></div>
            </div>
            <div class="fa-pull-left" style="margin-left:10px;">
                <?php echo $rate4; ?>
            </div>
        </div>
        <div class="fa-pull-left">
            <div class="fa-pull-left">3 <i class="fa-solid fa-star"></i></div>
            <div class="progress fa-pull-left" style="width: 180px">
                <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $percent3; ?>"></div>
            </div>
            <div class="fa-pull-left" style="margin-left:10px;">
                <?php echo $rate3; ?>
            </div>
        </div>
        <div class="fa-pull-left">
            <div class="fa-pull-left">2 <i class="fa-solid fa-star"></i></div>
            <div class="progress fa-pull-left" style="width: 180px">
                <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $percent2; ?>"></div>
            </div>
            <div class="fa-pull-left" style="margin-left:10px;">
                <?php echo $rate2; ?>
            </div>
        </div>
        <div class="fa-pull-left">
            <div class="fa-pull-left">1 <i class="fa-solid fa-star"></i></div>
            <div class="progress fa-pull-left" style="width: 180px">
                <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $percent1; ?>"></div>
            </div>
            <div class="fa-pull-left" style="margin-left:10px;">
                <?php echo $rate1; ?>
            </div>
        </div>
    </div>

    <br><br><br>

</section>


<section style="margin: 50px 350px 30px 100px;display: block; border: 1px solid #eee; ">
    <div>
        <?php
        $sql2 = "SELECT *FROM rating WHERE product_id = $id";
        $res = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res);
        if ($count2 > 0) {
            foreach ($res as $row){
                if ($row['comment'] != ''){
                    ?>
                    <div style="padding: 20px 60px">
                        <h5><?php echo $row['username']; ?></h5>
                        <div class=" rate" id="outer">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                $ratingClass = "fa-solid fa-star";
                                $ratingColor = "#d7dadf";

                                if ($i <= $row['rating_number']) {
                                    $ratingClass = "fa-solid fa-star";
                                    $ratingColor = "#ffc800";
                                }
                                ?>
                                <div class="inner">
                                    <i class="<?php echo $ratingClass; ?>" style="color: <?php echo $ratingColor; ?>"
                                       aria-label="Left Align"></i>
                                </div>

                            <?php } ?>
                        </div>
                        <p style="color: grey">
                            <?php echo $row['created_date']; ?>
                        </p>
                        <p style="font-size: 18px">
                            <?php echo $row['comment']; ?>
                        </p>
                    </div>
                    <hr style="border-top: #eee">
                    <?php

                }
                ?>


                <?php
            }
        }

        ?>
    </div>
</section>

<style>
    #outer {
        width: 100%;
        text-align: center;
    }

    .inner {
        display: inline-block;
    }
</style>
</body>

<!--------------------FOOTER--------------------------- -->
<?php require_once "footer.php"?>