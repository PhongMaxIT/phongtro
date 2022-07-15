<?php
include('ketnoi.php');
//lấy về tất cả user
function get_all_users()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
// Câu truy vấn lấy tất cả user
    $sql = "select * from tblquanly";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    // Mảng chứa kết quả
    $result = array();
     
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
  
    // Trả kết quả về
    return $result;
}

  // Hàm lấy user theo user_id
  function get_tblquanly_by_userID($user_id)
  {    
  // Gọi tới biến toàn cục $conn
      global $conn;
  // Câu truy vấn lấy tất cả sinh viên
      $sql = "select * from tblquanly where userID = $user_id";
       
      // Thực hiện câu truy vấn
      $query = mysqli_query($conn, $sql);
       
      // Mảng chứa kết quả
      $result = array();
       
      // Nếu có kết quả thì đưa vào biến $result
      if (mysqli_num_rows($query) > 0){
          $row = mysqli_fetch_assoc($query);
          $result = $row;
      }
       
      // Trả kết quả về
      return $result;
  }
  // Hàm sửa user
function edit_user($user_id,$username, $password, $email,$hoten,$ghichu)
{
        
    // Chống SQL Injection
    
    $user_id = addslashes($user_id);
    $username = addslashes($username);
    $password=addslashes($password);
    $email = addslashes($email);
    $hoten= addslashes($hoten);
    $ghichu=addslashes($ghichu);
   
    // Câu truy vấn thêm
    $sql = "
            UPDATE tblquanly SET
            username = '$username',            
            password='$password',
            Email = '$email',
            Hoten = '$hoten',
            Ghichu = '$ghichu'         
            WHERE userID = $user_id
            ";

// Gọi tới biến toàn cục $conn
    global $conn;    
// Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);    
    return $query;
}
// Hàm xóa user
function delete_user($userID)
{
     // Gọi tới biến toàn cục $conn
    global $conn;   
    $sql = "
            DELETE FROM tblquanly
            WHERE userID= $userID
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
