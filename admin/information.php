<?php require_once('./database/dbhelper.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<head>
    <title>Thêm Sản Phẩm</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- summernote -->
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <style>
        table {
            transform: translate(150px, 100px);
            height: 100px;
            width: 1000px;

        }

        section h2 {
            transform: translate(500px, 60px);
            width: 200px;
            border-bottom: 1px solid black;
        }

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
                <h1>Bảng Khách Hàng</h1>
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
                    <h2>Khách Hàng</h2>
                    <table>
                        <tr class="bold">
                            <th>STT</th>
                            <th>Tên Khách Hàng</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>
                            <th>Số điện thoại</th>
                        </tr>
                        <?php
                        try {

                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            $limit = 10;
                            $start = ($page - 1) * $limit;

                            $sql = "SELECT * from tbl_dangky
                                  limit $start,$limit ";
                            $order_details_List = executeResult($sql);
                            $total = 0;
                            $count = 0;
                            // if (is_array($order_details_List) || is_object($order_details_List)){
                            foreach ($order_details_List as $item) {
                                echo '
                                        <tr style="text-align: center;">
                                            <td>' . (++$count) . '</td>
                                            <td>' . $item['name_client'] . '</td>
                                            <td>' . $item['email'] . '</td>
                                            <td>' . $item['address'] . '</td>
                                            <td>' . $item['number_phone'] . '</td>
                                        </tr>
                                    ';
                            }
                        } catch (Exception $e) {
                            die("Lỗi thực thi sql: " . $e->getMessage());
                        }
                       
                        ?>
                    </table>
                </section>
            </main>
        </div>
        
    </div>
    <ul class="pagination">
                <?php
                $sql = "SELECT * from tbl_dangky";
                $servername = "localhost";
                $username = "root";
                $password = "badien217";
                $dbname = "shop_quanao";
                 
                // tạo connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                $result = mysqli_query($conn, $sql);
                $current_page = 0;
                if (mysqli_num_rows($result)) {
                    $numrow = mysqli_num_rows($result);
                    $current_page = ceil($numrow / 10);
                }
                for ($i = 1; $i <= $current_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '
            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '
            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>
                    ';
                    }
                }
                ?>
            </ul>
</body>

</html>