<?php
require_once('connect.php');

function execute($sql)
{
	//save data into table
	// open connection to database
    $con = mysqli_connect("localhost","root","badien217","shop_quanao");

    mysqli_set_charset($con, 'UTF8');
	//insert, update, delete
	mysqli_query($con, $sql);

	//close connection
	mysqli_close($con);
}

function executeResult($sql)
{
    $con = mysqli_connect("localhost","root","badien217","shop_quanao");
    mysqli_set_charset($con, 'UTF8');
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$data   = array();
	while ($row = mysqli_fetch_array($result, 1)) {
		$data[] = $row;
	}
	mysqli_close($con);
	return $data;
}

function executeSingleResult($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect("localhost","root","badien217","shop_quanao");
    mysqli_set_charset($con, 'UTF8');
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result, 1);

	//close connection
	mysqli_close($con);

	return $row;
}

//Đây là một tập lệnh PHP chứa ba hàm thực thi các câu lệnh SQL trên cơ sở dữ liệu MySQL.
//
//Hàm đầu tiên, execute, lấy một truy vấn SQL làm tham số và thực thi nó mà không trả về bất kỳ dữ liệu nào.
// Hàm này thường được sử dụng cho các truy vấn sửa đổi cơ sở dữ liệu, chẳng hạn như các câu lệnh chèn, cập nhật và xóa.
//
//Hàm thứ hai, executeResult, lấy một truy vấn SQL làm tham số của nó và trả về một mảng của tập hợp kết quả.
// Hàm này thường được sử dụng cho các truy vấn truy xuất dữ liệu từ cơ sở dữ liệu, chẳng hạn như các câu lệnh chọn.
//
//Hàm thứ ba, executeSingleResult, tương tự như executeResult nhưng được sử dụng khi truy vấn dự kiến ​​ chỉ trả về
// một hàng dữ liệu. Hàm này trả về một hàng dưới dạng một mảng kết hợp.
//
//Cả ba hàm kết nối với cơ sở dữ liệu MySQL bằng hàm mysqli_connect, đặt bộ ký tự thành UTF-8 bằng hàm mysqli_set_charset,
// thực hiện truy vấn bằng hàm mysqli_query, truy xuất tập kết quả bằng hàm mysqli_fetch_array, lưu trữ dữ liệu trong
// một mảng và đóng cơ sở dữ liệu kết nối sử dụng mysqli_closechức năng.
//
//Lưu ý rằng thông tin đăng nhập cơ sở dữ liệu (máy chủ, tên người dùng, mật khẩu và tên cơ sở dữ liệu)
//
// được mã hóa cứng vào các hàm, đây có thể không phải là phương pháp hay nhất vì lý do bảo mật. Sẽ tốt hơn nếu
// lưu trữ các thông tin đăng nhập này trong tệp cấu hình được bao gồm trong tập lệnh và sử dụng các biến môi trường
// hoặc các phương tiện an toàn khác để truy xuất thông tin đăng nhập.