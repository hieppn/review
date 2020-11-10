<?php 


if(isset($_GET['action'])){
    $action= $_GET['action'];
}
else{
    $action="";
}
$thanhcong= array();
switch($action){
    case 'add':{
        if(isset($_POST['add_user'])){
            $hoten=$_POST['hoten'];
            $namsinh=$_POST['namsinh'];
            $quequan=$_POST['quequan'];
            if($db->insertData($hoten,$namsinh,$quequan)){
                $thanhcong [] = 'add_success';
            }
        }
        require_once('View/thanhvien/add_user.php');
    break;
    }
    case 'edit':{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $tblTable = 'thanhvien';
            $dataId= $db->getDataId($tblTable,$id);

            if(isset($_POST['edit_user'])){
                $hoten = $_POST['hoten'];
                $namsinh = $_POST['namsinh'];
                $quequan = $_POST['quequan'];
                if($db->updateData($id,$hoten,$namsinh,$quequan)){
                    $thanhcong[] = 'edit_success';
                }
            }
        }
        require_once('View/thanhvien/edit_user.php');
    break;
}
    case 'delete':{
       
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            if($db->delete($id)){
                echo "<script type='text/javascript'>alert('Xóa thành viên thành công.');</script>";
                echo '<script type="text/javascript">
                window.location = "index.php?controller=thanhvien&action=list"
                </script>';
             }
        }
    break;
    }
    case 'list':{
        $tblTable = 'thanhvien';
        $data = $db->getAllData($tblTable);
        require_once('View/thanhvien/list.php');
    break;
    }
    case 'search':{
       
        if(isset($_GET['tukhoa'])){
            $tukhoa=$_GET['tukhoa'];
            $tblTable = 'thanhvien';
            $data_search = $db->searchData($tblTable,$tukhoa);
        }
        require_once('View/thanhvien/search_user.php');
    break;
    }
    default:{
        require_once('View/thanhvien/list.php');
    break;
    }
}
?>