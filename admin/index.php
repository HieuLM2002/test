<?php
session_start();
if (!isset($_SESSION['submit'])) {
    header('Location: login.php');
}
?>

<?php require_once('./database/dbhelper.php'); ?>
<?php
header("content-type:text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScrseipt -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Quản lý sản phẩm</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="category/index.php">Thống kê</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category/index.php">Quản lý danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product/">Quản lý sản phẩm</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="dashboard.php">Quản lý đơn hàng</a>
                </li>
            </ul>
        </header>
        <div class="container">
            <main>
                <h1>Bảng Thống Kê</h1>
                <section class="dashboard">
                    <div class="table">
                        <div class="sp">
                            <p>Sản phẩm</p>
                            <?php
                            $sql = "SELECT * FROM `product`";
                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                            $result = mysqli_query($conn, $sql);
                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                            ?>
                            <p><a href="product/">xem chi tiết➜</a></p>
                        </div>
                        <div class="sp kh">
                            <p>Khách hàng</p>
                            <?php
                            $sql = "SELECT * FROM `tbl_dangky`";
                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                            $result = mysqli_query($conn, $sql);
                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                            ?>
                            <p><a href="information.php">xem chi tiết➜</a></p>
                        </div>
                        <div class="sp dm">
                            <p>Danh mục</p>
                            <?php
                            $sql = "SELECT * FROM `category`";
                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                            $result = mysqli_query($conn, $sql);
                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                            ?>
                            <p><a href="category/">xem chi tiết➜</a></p>
                        </div>
                        <div class="sp dh">
                            <p>Đơn hàng</p>
                            <?php
                            $sql = "SELECT * FROM `order_details`";
                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                            $result = mysqli_query($conn, $sql);
                            echo '<span>' . mysqli_num_rows($result) . '</span>';
                            ?>
                            <p><a href="dashboard.php">xem chi tiết➜</a></p>
                        </div>
                    </div>
                </section>
                <section class="new-order">
                    <h4>Đơn hàng mới</h4>
                    <table>
                        <tr class="bold">
                            <td>STT</td>
                            <td>Tên</td>
                            <td>Giá sản phẩm</td>
                            <td>Số Lượng</td>
                            <td>Comment</td>
                            <td>star</td>
                        </tr>
                        <?php
                        
                        if(isset($_GET['trang'])){
                          $page = $_GET['trang'];
                        }else{
                          $page = '';
                        }
                        if($page == ''|| $page == 1){
                          $begin = 0;
                        }else{
                          $begin = ($page *8) - 8;
                        }
                    

                            $sql = "SELECT * FROM product,report WHERE product.id = report.id_report limit $begin,8";
                            executeResult($sql);
                            // $sql = 'select * from product limit $star,$limit';
                            $productList = executeResult($sql);

                            $index = 1;
                            foreach ($productList as $item) {
                                echo '  <tr>
                                            <td>' . $item['id'] . '</td>
                                            
                                            <td>' . $item['title'] . '</td>
                                            <td>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</td>
                                            <td>' . $item['number'] . '</td>
                                            <td><div class="time">
                                            <img src="../images/icon/icon-clock.svg" alt="">
                                            <span>' . $item['comment'] . ' comment</span>
                                            </div></td>
                    
                                            <td class="b-500">
                                            <div class="more">
                                            <div class="star">
                                                <img src="../images/icon/icon-star.svg" alt="">
                                                <span>' . $item['star'] . '</span>
                                            </div></td>
                                        </tr>
                                    ';
                            
                        }
                        ?>
                    </table>
                </section>
                <?php
            
            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
            $sql_trang = mysqli_query($conn, "select * from product");
            
            
                $numrow = mysqli_num_rows($sql_trang);
                $current_page = ceil($numrow / 8);
                // echo $current_page;
            ?>
                <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <?php
                  for($i=1; $i<= $current_page;$i++){
                   
              
                    
                  ?>
                  
                  <li class="page-item">
                    <a class="page-link" href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>
                  </li>
                
                  <?php
                }
            ?>
            </main>
        </div>
    </div>
</body>


<!-- style  -->
<style>
    #wrapper {
        padding-bottom: 5rem;
    }

    .b-500 {
        font-weight: 500;
    }

    .red {
        color: red;
    }

    .green {
        color: green;
    }
</style>

</html>