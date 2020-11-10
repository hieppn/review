<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thành viên</title>
</head>

<body>
    <!-- <?php print_r($dataId) ?>  -->
    <div class="content">
        <div class="dangkithanhvien">
            <a href="index.php?controller=thanhvien&action=list" class="list">Danh sách thành viên</a>
            <h4>Thay đổi thông tin thành viên</h4>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Họ và tên<span style="color:red;">*</span></td>
                        <td>
                            <input type="text" required name="hoten" value="<?php  echo $dataId['hoten'];?> "
                                placeholder=" Họ và tên thành viên">
                        </td>
                    </tr>
                    <tr>
                        <td>Năm sinh <span style="color:red;">*</span></td>
                        <td><input type="text" required name="namsinh" value="<?php  echo $dataId['namsinh'];?>"
                                placeholder=" Năm sinh"></td>
                    </tr>
                    <tr>
                        <td>Quê quán <span style="color:red;">*</span></td>
                        <td> <input type="text" required name="quequan" value="<?php  echo $dataId['quequan'];?>"
                                placeholder=" Quê quán"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="edit_user" value=" Cập nhập"></td>
                    </tr>
                </table>
            </form>
            <?php
    if(isset($thanhcong) && in_array('edit_success',$thanhcong)){
        echo "<script type='text/javascript'>alert('Cập nhập thành công.');</script>";
        echo '<script type="text/javascript">
           window.location = "index.php?controller=thanhvien&action=list"
      </script>';
    }
    
    ?>
        </div>
    </div>
</body>

</html>