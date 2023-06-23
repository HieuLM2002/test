<?php
function removeSpecialCharacter($str) {
	$str = str_replace('\\', '\\\\', $str);
	$str = str_replace('\'', '\\\'', $str);
	return $str;
}

function getPost($key) {
	$value = '';
	if(isset($_POST[$key])) {
		$value = $_POST[$key];
	}

	return removeSpecialCharacter($value);
}

function getGet($key) {
	$value = '';
	if(isset($_GET[$key])) {
		$value = $_GET[$key];
	}

	return removeSpecialCharacter($value);
}
//Hàm đầu tiên, removeSpecial Character(), lấy một chuỗi làm đầu vào và loại bỏ bất kỳ ký tự đặc biệt
//nào có thể gây ra sự cố khi chèn chuỗi vào cơ sở dữ liệu SQL. Cụ thể, nó thay thế dấu gạch chéo ngược bằng hai
// dấu gạch chéo ngược và dấu nháy đơn bằng dấu gạch chéo ngược và dấu nháy đơn. Đây là một hình thức vệ sinh dữ liệu
// cơ bản để ngăn chặn các cuộc tấn công SQL injection.
//
//Hàm thứ hai, getPost() và getGet(), lấy một khóa chuỗi làm đầu vào và truy xuất giá trị tương ứng từ mảng $_POST
// hoặc $_GET tương ứng. Nếu khóa không được đặt trong mảng, nó sẽ trả về một chuỗi rỗng. Sau đó, hàm này gọi
// hàm removeSpecial Character() để khử trùng giá trị đã truy xuất trước khi trả về giá trị đó.
//
//Các chức năng này có thể được sử dụng trong tập lệnh PHP để truy xuất và làm sạch dữ liệu từ đầu vào của
// người dùng được gửi qua các biểu mẫu hoặc URL HTML. Điều này giúp ngăn chặn các lỗ hổng bảo mật như tấn công SQL injection.