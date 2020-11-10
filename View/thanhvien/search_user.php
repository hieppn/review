<div class="timkiem">
<form action="" method="get">
<input type="hidden" name="controller" value="thanhvien">
    <table>
        <tr>
            <td>
                <input type="text" name="tukhoa" placeholder="Nhập từ khóa..">
            </td>
            <td>
                <input type="submit" name="timkiem" value="Tìm kiếm">
            </td>
        </tr>
    </table>
<input type="hidden" name="action" value="search">
</form>

</div>
<div class="danhsach">
<a href="index.php?controller=thanhvien&action=list">Trở lại<<</a>
    <h3>Danh sách thành viên được tìm thấy</h3>
    <table border="1px;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Năm sinh</th>
                <th>Quê quán</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
 $stt=1;
foreach ($data_search as $value) {
?>
                <td> <?php  echo $stt;?></td>
                <td> <?php  echo $value['hoten']?></td>
                <td> <?php  echo  $value['namsinh']?></td>
                <td> <?php  echo  $value['quequan']?></td>
                <td class="action">
                    <button class="btn_edit"><a
                            href="index.php?controller=thanhvien&action=edit&id=<?php echo $value['id']?>">Sửa</a></button>
                    <button class="btn_delete"><a
                            href="index.php?controller=thanhvien&action=delete&id=<?php echo $value['id']?>">Xóa</a></button>
                </td>
            </tr>
            <?php 
}

?>
        </tbody>
    </table>
</div>