<?php
namespace Model\Core;
class Adapter{
	private $config=[
		'host'=>'localhost',
		'username'=>'root',
		'password'=>'',
		'database'=>'questecom'
	];
	private $connect=null;
	public function connection(){
		$connect=new \mysqli($this->config['host'],$this->config['username'],$this->config['password'],$this->config['database']);
		$this->setConnect($connect);
	}
	public function setConnect(\mysqli $connect){
		$this->connect=$connect;
		return $this;
	}
	public function getConnect(){
		return $this->connect;
	}

	public function isConnected(){
		if(!$this->getConnect()){
			return false;
		}
		return true;
	}
	public function insert($query){
		if(!$this->isConnected()){
			$this->connection();
		}
		$this->query=$query;
		$result=$this->getConnect()->query($query);
		if($result){
			return $this->getConnect()->insert_id;
		}else{
			return false;	
		}
	}
	public function fetchAll($query){
		if(!$this->isConnected()){
			$this->connection();
		}
		$this->query=$query;
		$result=$this->getConnect()->query($query);
		$data=$result->fetch_all(MYSQLI_ASSOC);
		return $data;

	}
	public function fetchRow($query){
		if(!$this->isConnected()){
			$this->connection();
		}
		$result=$this->getConnect()->query($query);
		if($result->num_rows>0){
			$data=$result->fetch_assoc();
			return $data;
		}
		return false;
		
	}

	public function fetchPair($query) {
        if (!$this->isConnected()) {
        	$this->connection();
        }
		$result = $this->getConnect()->query($query);
		$rows = $result->fetch_all();
		if(!$rows) {
	        return $rows;
		}
		$columns = array_column($rows, '0');
		$values = array_column($rows, '1');
		
		return array_combine($columns, $values);
    }
	
	public function update($query){
		if(!$this->isConnected()){
			$this->connection();
		}
		$this->query=$query;
		$result=$this->getConnect()->query($query);
		if($result){
			return true;
		}else{
			return false;	
		}
	}

	public function delete($query){
		if(!$this->isConnected()){
			$this->connection();
		}
		$this->query=$query;
		$result=$this->getConnect()->query($query);
		if($result){
			return true;
		}else{
			return false;
		}
	}
}
?>