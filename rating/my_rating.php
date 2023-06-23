<?php
require_once('../database/dbper.php');
$conn = mysqli_connect('localhost','root','badien217','shop_quanao');
?>

<html lang="en">
<head>
    <title>rating</title>
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/9e832626f4.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>

</head>

<!-----------------------HEARDER ----------------------------------------->


<style>
.box{
    transform: translate(+15%,7%);
}


</style>
<body style="margin: 50px 100px">
<?php
if (isset($_GET['product_id']) && isset($_GET['username'])){
    $product_id = $_GET['product_id'];
    $username = $_GET['username'];
}
$sql = "SELECT *FROM product WHERE id='$product_id'; ";
$query_product = mysqli_query($conn,$sql);
if ($query_product == true){
    $count  = mysqli_num_rows($query_product);
    if ($count > 0){
        $row = mysqli_fetch_assoc($query_product);

        $thumbnail = $row['thumbnail'];
        $title = $row['title'];
    }
}

?>
<?php
if(isset($_POST['rating_submit'])){

    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

   

    $sql1= "SELECT * FROM tbl_dangky WHERE  username = '$username' LIMIT 1";
    $res = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_assoc($res);
//    $count = mysqli_num_rows($res);
$id_client = $row['register_id'];
    $created_date  = date('Y-m-d H:i:s');
    $sql2 = "INSERT INTO rating (product_id,user_id,rating_number,username, comment,create_date) 
                VALUES('$product_id','$id_client','$rating','$username','$comment','$created_date')";

    $insert_comment = mysqli_query($conn , $sql2);
    
    if (isset($insert_comment)){
        header("location:../giaodien/details.php?id=$product_id");

    }

}
?>
<div class="box">
<section class="box1">
    <div >
        <img class="thumbnail" src="../admin/product/<?php echo $thumbnail; ?>"  width="150px" style="display: inline; border: 1px solid black; border-radius: 10px">
        <h3 style="display: inline; margin: 10px; width:150px"><?php echo $title; ?></h3>
    </div>
</section>

<section class="account-form">

    <form action="#" method="post">
        <h2 style="margin-bottom: 50px; padding-left:30px">Rating and reviews</h2>
        <div class="">
            <span style="display: inline-block;padding-left:30px">Product quality: </span>
            <div class="stars" style="display: inline-block;padding-left:30px">
                <label class="rate">
                    <input type="radio" name="rating" id="star1" value="1" required>
                    <div class="face"></div>
                    <i class="far fa-star star one-star"></i>
                </label>
                <label class="rate">
                    <input type="radio" name="rating" id="star2" value="2">
                    <div class="face"></div>
                    <i class="far fa-star star two-star"></i>
                </label>
                <label class="rate">
                    <input type="radio" name="rating" id="star3" value="3">
                    <div class="face"></div>
                    <i class="far fa-star star three-star"></i>
                </label>
                <label class="rate">
                    <input type="radio" name="rating" id="star4" value="4">
                    <div class="face"></div>
                    <i class="far fa-star star four-star"></i>
                </label>
                <label class="rate">
                    <input type="radio" name="rating" id="star5" value="5">
                    <div class="face"></div>
                    <i class="far fa-star star five-star"></i>
                </label>
            </div>
        </div>


        <p class="placeholder" style="padding-left:30px">Comment: </p>
        <div style="padding-left:30px">
        <textarea style="padding-left:30px" name="comment" placeholder="Leave a review here" maxlength="1000" cols="100" rows="5"></textarea>
</div>
        <div style="margin-top: 20px ;padding-left:30px">
            <a href="../giaodien/details.php?id=<?php  echo $product_id; ?>">
                <input type="submit" value="POST" name="rating_submit" class="btn btn-primary">
            </a>

            <button class="btn btn-warning">Cancel</button>
        </div>

    </form>

</section>
</div>

</body>
</html>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
<script>

    $(function() {
        $(document).on('click', '.rate', function() {
            if ( !$(this).find('.star').hasClass('rate-active') ) {
                $(this).siblings().find('.star').addClass('far').removeClass('fas rate-active');
                $(this).find('.star').addClass('rate-active fas').removeClass('far star-over');
                $(this).prevAll().find('.star').addClass('fas').removeClass('far star-over');
            } else {
                console.log('has');
            }
        });

    });

</script>

<style>
    .box{
        border: solid black;
        width: 1000px;
        border-radius: 12px;
    }
    .box1 {
        padding: 30px;
    }
    account-form{
        text-align: center;
    }

.stars {
        width: fit-content;
        cursor: pointer;
    }

    .star {
        color: #F5C900 !important;
    }

    .rate {
        height: 50px;
        margin-left: -5px;
        padding: 5px;
        font-size: 25px;
        position: relative;
        cursor: pointer;
    }

    .rate input[type="radio"] {
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, 0%);
        pointer-events: none;
    }

    .rate:nth-child(1) .face::after {
        content: "\f119";
        /* ☹ */
    }

    .rate:nth-child(2) .face::after {
        content: "\f11a";
        /* 😐 */
    }

    .rate:nth-child(3) .face::after {
        content: "\f118";
        /* 🙂 */
    }

    .rate:nth-child(4) .face::after {
        content: "\f580";
        /* 😊 */
    }

    .rate:nth-child(5) .face::after {
        content: "\f59a";
        /* 😄 */
    }

    .face {
        opacity: 0;
        position: absolute;
        width: 35px;
        height: 35px;
        background: #F5C900;
        border-radius: 5px;
        top: -50px;
        left: 2px;
        transition: 0.2s;
        pointer-events: none;
    }

    .face::before {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        content: "\f0dd";
        display: inline-block;
        color: #F5C900;
        z-index: 1;
        position: absolute;
        left: 9px;
        bottom: -15px;
    }

    .face::after {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        display: inline-block;
        color: #fff;
        z-index: 1;
        position: absolute;
        left: 5px;
        top: -1px;
    }

    .rate:hover .face {
        opacity: 1;
    }

</style>
<style>
    .btn-cancel {
        border-radius: 10px;
        padding: 5px 10px;
        border: none;
        color: white;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #9b59b6;
    }

    .btn-cancel:hover {
        opacity: 0.8;
    }

    .btn-post {
        border-radius: 10px;
        padding: 5px 20px;
        border: none;
        color: white;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #d43f8d;
    }

    .btn-post:hover {
        opacity: 0.8;
    }
    
</style>