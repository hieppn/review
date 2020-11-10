<?php
class Database{
	private $hostname='localhost';
	private $username='root';
	private $pass='';
	private $dbname='quanlythanhvien_mvc';
	private $conn =Null;
	private $result=Null;

	public function connect(){

		$this->conn= new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
		if(!$this->conn){
			echo "Kết nối thất bại!!";
			exit();
		}
		else{
			mysqli_set_charset($this->conn,'utf8');
		}
		return $this->conn;
	}
	public function execute($sql){
		$this->result=$this->conn->query($sql);
		return $this->result;
	}
	// public function execute(){
	// 	$sql ="SELECT * FROM"
	// 	$this->result=$this->conn->query($sql);
	// 	return $this->result;
	// }
	public function getData(){
		if($this->result){
			$data= mysqli_fetch_array($this->result);
		}
		else{
			$data=0;
		}
		return $data;
	}

public function num_rows(){
	if($this->result){
		$num = mysqli_num_rows($this->result);
	}
	else{
		$num =0;
	}
	return $num;
}
	public function getAllData($table){
		$sql ="SELECT * FROM $table";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data=0;
		}
		else{
			while($datas=$this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}

	public function getDataId($table, $id){
		$sql = "SELECT * FROM $table WHERE id = '$id'";
		$this->execute($sql);
		if($this->num_rows()!=0){
			$data= mysqli_fetch_array($this->result);
		}
		else{
			$data=0;
		}
		return $data;
	}

	public function insertData($hoten,$namsinh,$quequan){
		$sql = "INSERT INTO thanhvien(id,hoten,namsinh,quequan)VALUES(null,'$hoten','$namsinh','$quequan')";
		return $this->execute($sql);
	}
	public function updateData($id,$hoten,$namsinh,$quequan){
		$sql = "UPDATE thanhvien SET hoten='$hoten',namsinh='$namsinh',quequan='$quequan' WHERE id='$id'";
		return $this->execute($sql);
	}
	public function delete($id){
		$sql =" DELETE FROM thanhvien WHERE id ='$id'";
		return $this->execute($sql);
	}
	public function searchData($table,$key){
		$sql ="SELECT * FROM $table WHERE hoten LIKE'%$key%' OR namsinh ='$key' ORDER BY id DESC";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data=0;
		}
		else{
			while($datas=$this->getData()){
				$data[] = $datas;
			}
		}
		return $data;
	}
}
?>