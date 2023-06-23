<?php
if (!empty($_POST) ) {
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
    }
    if ($cart == null || count($cart) == 0) {
        header('Location: index.php');
        die();
    }
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $orderDate = date('Y-m-d H:i:s');

    // thêm vào order
    $sql = "INSERT INTO orders(full_name, phone_number,email, address, note, order_date) values ('$fullname','$phone_number','$email','$address','$note','$orderDate')";
    execute($sql);

    $sql = "SELECT * FROM orders WHERE order_date = '$orderDate'";
    $order = executeResult($sql); // in ra 1 dòng
    $orderId = $order[0]['id'];
//    var_dump($orderId);
//    foreach ($order as $item) {
//        $orderId = $item['id'];
//    }
    if (isset($_SESSION['username'])) {
        $tendangnhap = $_SESSION['username']; // xem laij cai nay no co hay k in ra
        echo $tendangnhap;
        $sql = "SELECT * FROM tbl_dangky WHERE username = '$tendangnhap'";
        $user = executeResult($sql); // in ra 1 dòng
        var_dump($user);
        foreach ($user as $item) {
            $userId = $item['register_id'];

        }// í tuong là lúc mua nó cx zô chỗ admin sao
        $idList = [];
        foreach ($cart as $item) {
            $idList[] = $item['id'];
        }
        if (count($idList) > 0) {
            $idList = implode(',', $idList); // chuyeern
            //[2, 5, 6] => 2,5,6

            $sql = "SELECT * FROM product where id in ($idList)";
            $cartList = executeResult($sql);
        } else {
            $cartList = [];
        }
        $status = 'Đang chuẩn bị';

        foreach ($cartList as $item) {
            $num = 0;
            foreach ($cart as $value) {
                if ($value['id'] == $item['id']) {
                    $num = $value['num'];
                    break;
                }
            }


            $sql = "INSERT into order_details(order_id, product_id, user_id, num, price, status) 
            values ($orderId, " . $item['id'] . ", " . $userId . ", '$num', " . $item['price'] . ",'$status')";
            execute($sql);
        }
    }


    header('Location: history.php');
    setcookie('cart', '[]', time() - 1000, '/');
}
//Đoạn code trên thực hiện xử lý khi người dùng đặt hàng trên website.
// Cụ thể, khi form đặt hàng được submit (điều kiện !empty($_POST) đúng), nó sẽ thực hiện các bước sau:
//
//Kiểm tra xem trong cookie có giỏ hàng ($_COOKIE['cart']) hay không. Nếu có, sẽ lấy ra và chuyển
// thành mảng $cart bằng hàm json_decode(). Nếu không, $cart sẽ là một mảng rỗng.
//
//Kiểm tra nếu giỏ hàng rỗng hoặc không tồn tại sản phẩm nào trong giỏ hàng,
// sẽ chuyển hướng người dùng đến trang chủ (index.php) và kết thúc chương trình (die()).
//
//Lấy các thông tin người dùng đã nhập từ form đặt hàng,
// bao gồm fullname, email, phone_number, address và note.
//
//Lấy thời điểm đặt hàng hiện tại bằng hàm date().
//
//Thêm thông tin đặt hàng vào trong database bằng câu lệnh SQL INSERT INTO.
//
//Lấy thông tin đơn hàng mới nhất vừa thêm vào database bằng câu lệnh SQL SELECT.
//
//Lấy id của đơn hàng đó và lưu vào biến $orderId.
//
//Nếu người dùng đã đăng nhập (isset($_SESSION['username'])), sẽ lấy thông tin của người dùng đó ($userId)
// từ bảng tbl_dangky trong database bằng câu lệnh SQL SELECT.
//
//Lấy ra danh sách id của các sản phẩm trong giỏ hàng ($cart) và chuyển thành chuỗi ký tự
// phân cách bằng dấu phẩy để truy vấn vào database.
//
//Lấy ra danh sách các sản phẩm trong giỏ hàng bằng câu lệnh SQL SELECT.
//
//Với mỗi sản phẩm trong danh sách sản phẩm trong giỏ hàng, thực hiện các bước sau:
//
//Lấy số lượng sản phẩm ($num) từ giỏ hàng $cart.

//Thêm thông tin đơn hàng chi tiết vào database bằng câu lệnh SQL INSERT INTO.

//Chuyển hướng người dùng đến trang lịch sử đơn hàng (history.php).
//
//Xóa giỏ hàng ('[]') khỏi cookie bằng hàm setcookie().

//Đầu tiên, đoạn code kiểm tra xem có dữ liệu được gửi lên từ trang web hay không. Nếu có, nó sẽ tiếp tục xử lý dữ
// liệu và đặt hàng. Nếu không, nó sẽ không làm gì cả và kết thúc.
//
//Đoạn code tạo ra một biến $cart để lưu giỏ hàng. Nếu cookie 'cart' đã được tạo, nó sẽ lấy dữ liệu từ cookie
// và gán cho biến $cart. Đoạn code sử dụng hàm json_decode() để giải mã chuỗi JSON lưu trong cookie thành một mảng PHP.
//
//Sau đó, đoạn code kiểm tra xem giỏ hàng có trống không. Nếu trống, nó sẽ chuyển hướng người dùng về trang
// chủ của trang web và kết thúc. Nếu không, nó sẽ tiếp tục đặt hàng.
//
//Đoạn code lấy dữ liệu từ form được gửi lên bởi người dùng, bao gồm họ và tên, email, số điện thoại, địa chỉ,
// ghi chú và ngày đặt hàng. Sau đó, nó thêm thông tin đơn hàng vào cơ sở dữ liệu bằng câu lệnh INSERT INTO.
//
//Sau khi đơn hàng được thêm vào cơ sở dữ liệu, đoạn code truy vấn cơ sở dữ liệu để lấy id của đơn hàng vừa
// thêm vào. Id này sẽ được sử dụng sau này để thêm thông tin chi tiết của đơn hàng.
//
//Nếu người dùng đăng nhập vào trang web, đoạn code sẽ lấy thông tin người dùng từ cơ sở dữ liệu và lưu
// trữ id của người dùng vào biến $userId. Sau đó, đoạn code sẽ tạo một mảng $idList chứa các id của sản phẩm trong giỏ hàng.
//
//Đoạn code kiểm tra xem $idList có chứa ít nhất một phần tử hay không. Nếu có, nó sẽ truy vấn cơ sở dữ
// liệu để lấy thông tin chi tiết của các sản phẩm trong giỏ hàng. Nếu không, nó sẽ gán giá trị rỗng cho $cartList.
//
//Sau khi lấy được thông tin chi tiết của các sản phẩm trong giỏ hàng, đoạn code sẽ thêm thông tin chi tiết đơn hàng vào cơ sở dữ liệu bằng câu lệnh INSERT INTO. Sau đó, nó sẽ chuyển hướng người dùng đến trang lịch sử đặt hàng và xóa cookie 'cart' để xóa




