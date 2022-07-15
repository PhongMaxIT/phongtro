<?php
 
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['username'])){
        die('');
    }
     
    //Nhúng file kết nối với database
    include('ketnoi.php');
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $username   = addslashes($_POST['username']);
    $password   = addslashes($_POST['password']);
    $email      = addslashes($_POST['email']);
    $fullname   = addslashes($_POST['fullname']);
  
         
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password || !$email || !$fullname)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
        // Mã khóa mật khẩu
        $password = md5($password);
          
    //Kiểm tra tên đăng nhập này đã có người dùng chưa
    if (mysqli_num_rows(mysqli_query($conn,"SELECT username FROM tblquanly WHERE username='$username'")) > 0){
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    
          
    //Kiểm tra email đã có người dùng chưa
    if (mysqli_num_rows(mysqli_query($conn,"SELECT email FROM tblquanly WHERE email='$email'")) > 0)
    {
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
          
    //Lưu thông tin thành viên vào bảng
    @$addmember = mysqli_query($conn,"
        INSERT INTO tblquanly (
            username,
            password,
            Email,
            Hoten
           
        )
        VALUES (
            '{$username}',
            '{$password}',
            '{$email}',
            '{$fullname}'
            
        )
    ");
                          
    //Thông báo quá trình lưu
    if ($addmember)
        echo "Quá trình đăng ký thành công. <a href='login1.php'>Về trang đăng nhập</a>";
    else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangki.php'>Thử lại</a>";
?>