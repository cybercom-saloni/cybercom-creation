<?php
class Model_Core_Adapter{
	private $config=[
		'host'=>'localhost',
		'username'=>'root',
		'password'=>'',
		'database'=>'cybercomproject'
	];
	private $connect=null;
	public function connection(){
		$connect=new mysqli($this->config['host'],$this->config['username'],$this->config['password'],$this->config['database']);
		$this->setConnect($connect);
	}
	public function setConnect(mysqli $connect){
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

	public function fetchPair($query)
    {
        if(!$this->isConnected())
		{
			return false;
		}
        else
        {
            $result = $this->getConnection()->query($query);
            $row = $result->fetch_all();
            $id = array_column($row,'0');
            $name = array_column($row,'1');
            return array_combine($id, $name);  
        }
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