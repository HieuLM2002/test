<?php
session_start();
require_once('../utily/utility.php');
require_once('../database/connect.php');
require_once('../database/dbper.php');

if(!empty($_POST)) {
	$action = getPost('action');
	$id = getPost('id');
	$num = getPost('num');

	$cart = [];
	if(isset($_COOKIE['cart'])) {
		$json = $_COOKIE['cart']; // lưu theo chuổi json
		$cart = json_decode($json, true);
	}

	switch ($action) {
		case 'add':
			$isFind = false; // kiểm tra tồn tại ko
			for ($i=0; $i < count($cart); $i++) { 
                    if($cart[$i]['id'] == $id) {
                        $cart[$i]['num'] += $num;
                        $isFind = true; // tìm thấy
                        break;
                    }		
			}

			if(!$isFind) { // k tìm thấy thì
				$cart[] = [
					'id'=>$id,
					'num'=>$num
				];
			}
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/'); // thời gian lưu : 30ngày -24h-60p-60s
			
			break;
		case 'delete':
			for ($i=0; $i < count($cart); $i++) { 
				if($cart[$i]['id'] == $id) {
					array_splice($cart, $i, 1);
					break;
				}
			}
			setcookie('cart', json_encode($cart), time() + 30*24*60*60, '/');
			
		break;
	}
}
//Đây là tập lệnh PHP quản lý hệ thống giỏ hàng đơn giản bằng cách sử dụng cookie.
// Nó bắt đầu một phiên và bao gồm một số tệp PHP cần thiết. Sau đó, nó sẽ kiểm tra xem có bất kỳ dữ
// liệu nào được đăng từ một biểu mẫu bằng cách sử dụng biến $_POST hay không. Nếu có, nó sẽ truy xuất
// các giá trị hành động, id và num từ dữ liệu biểu mẫu bằng cách sử dụng một hàm tùy chỉnh có tên getPost()
// được xác định trong tệp tiện ích.php.
//
//Tiếp theo, nó sẽ kiểm tra xem có bộ cookie giỏ hàng nào không. Nếu có, nó sẽ truy xuất dữ liệu giỏ hàng
// và giải mã dữ liệu đó từ định dạng JSON thành một mảng bằng cách sử dụng hàm json_decode(). Nếu không có cookie giỏ
// hàng nào được đặt, thì mảng giỏ hàng được khởi tạo ở dạng trống.
//
//Sau đó, nó bật giá trị của biến hành động. Nếu là 'thêm', tập lệnh sẽ kiểm tra xem mặt hàng có id đã cho đã tồn tại
// trong mảng giỏ hàng chưa. Nếu đúng như vậy, tập lệnh sẽ tăng số lượng của mặt hàng theo giá trị số đã cho.
// Mặt khác, nó thêm một mặt hàng mới với các giá trị id và num đã cho vào mảng giỏ hàng.
//
//Nếu hành động là 'xóa', tập lệnh sẽ tìm kiếm mặt hàng có id đã cho trong mảng giỏ hàng và xóa mặt hàng đó
// bằng hàm array_splice().
//
//Cuối cùng, tập lệnh đặt cookie giỏ hàng với dữ liệu giỏ hàng được cập nhật ở định dạng JSON
// và cookie được đặt hết hạn sau 30 ngày.

