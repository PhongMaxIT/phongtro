<?php
include("layout/header.php");
include("libs/tblquanly.php");
$users = get_all_users();

?>
<div class="container">
  <h2>Quản Lý Trọ</h2>
  <p>Thông Tin Khách Trọ</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
      <th>STT</th>
        <th>username</th>
        <th>password</th>
        <th>Email</th>
        <th>Hoten</th>
        <th>Ghichu</th>
        <th>Chức Năng</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $stt = 0;
        if(!empty($users)){
            foreach($users as $item){
                $stt++;
        ?>
      <tr>
          <td><?php echo $stt;?></td>
          <td><?php echo $item['username']; ?></td>
          <td><?php echo $item['password']; ?></td>
          <td><?php echo $item['Email']; ?></td>
          <td><?php echo $item['Hoten']; ?></td>
          <td><?php echo $item['Ghichu']; ?></td>
          <form method="post" action="user-delete.php">
          <td><input onclick="window.location='user-edit.php?id=<?php echo $item['userID']; ?>'" name="edit" id="" class="btn btn-success" type="button" value="Sửa">
          <input type="hidden" name="userID" value="<?php echo $item['userID']; ?>"/>
          <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete"  class="btn btn-success"value="Xóa"/></td>
        </form>
        
      </tr>
      <?php }//end forech
        } // end if
        ?>  
    </tbody>
  </table>
</div>
        <?php
include("layout/footer.php");
?>