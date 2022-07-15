<?php
require 'libs/tblquanly.php';
$user_id = isset($_GET['id']) ? (int)$_GET['id'] : '';
$data = array();
$errors = array();
if($user_id){
    $data = get_tblquanly_by_userID($user_id);
}
//nếu nhấn nút Cập nhật
if (!empty($_POST['btnCapNhat'])){
    echo "Hello";
    //Lấy dữ liệu từ form
    $username   = isset($_POST['username'])?addslashes($_POST['username']):'';   
    $password   = isset($_POST['password'])?addslashes(md5($_POST['password'])):'';
    $email   = isset($_POST['Email'])?addslashes($_POST['Email']):'';
    $Hoten  = isset($_POST['Hoten'])?addslashes($_POST['Hoten']):'';
    $Ghichu  = isset($_POST['Ghichu'])?addslashes($_POST['Ghichu']):'';
   
    $data['username'] = $username;
    $data['password'] = md5 ($password);
    $data['Email'] = $email;
    $data['Hoten'] =  $Hoten;
    $data['Ghichu'] =  $Ghichu;
    // Validate
    if (empty($data['username'])){
        $errors['username'] = 'Bạn chưa nhập username';
    }     
    
    if (empty($data['password'])){
        $errors['password'] = 'Bạn chưa nhập mật khẩu';
    }
    if (empty($data['Email'])){
        $errors['Email'] = 'Bạn chưa nhập email';
    }
    if (empty($data['Hoten'])){
        $errors['Hoten'] = 'Bạn chưa nhập họ tên đầy đủ';
    }
    
    if (empty($data['Ghichu'])){
        $errors['Ghichu'] = 'Bạn chưa chọn ghi chú';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        edit_user($user_id,$data['username'],$data['password'],$data['Email'], $data['Hoten'], $data['Ghichu']);
        header("location: userlist.php");
    }
}

?>
<?php require 'layout/header.php'; ?>
    <div class="container">
  <h1>Trang Sửa Khách Trọ</h1>
  <div class="form-group">
  <form  method="POST"> 
  <input type="hidden" name="token" value="<?php echo $token ?>
    <div class="form-group">
      <label for="">Username</label>
      <input type="text" value="<?php echo !empty($data['username']) ? $data['username'] : ''; ?>"
        class="form-control" name="username" id="" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="text" value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>"

        class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="email"value="<?php echo !empty($data['Email']) ? $data['Email'] : ''; ?>"

        class="form-control" name="Email" id="" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="">Họ tên</label>
      <input type="text"value="<?php echo !empty($data['Hoten']) ? $data['Hoten'] : ''; ?>"

        class="form-control" name="Hoten" id="" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="">Ghi chú</label>
      <input type="text"value="<?php echo !empty($data['Ghichu']) ? $data['Ghichu'] : ''; ?>"

        class="form-control" name="Ghichu" id="" aria-describedby="helpId" placeholder="">
    </div>
   
    </div>
    <input type="submit" class="btn btn-primary" name = "btnCapNhat" > 
    

   </form>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php
require("layout/footer.php");
?>
