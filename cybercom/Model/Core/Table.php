<?php
namespace Model\Core;
\Mage::loadFileByClassName('Model\Core\Adapter');
class Table{
	protected $primaryKey=null;
	protected $tableName=null;
	protected $adapter=null;
	protected $originalData=[];
	protected $data=[];
	protected $status=null;
	const STATUS_ENABLED=1;
	const STATUS_DISABLED=0;

	public function setOriginalData($originalData)
	{
		$this->originalData = $originalData;
		return $this;
	}

	public function getOrginalData()
	{
		return $this->OriginalData;
	}

	public function resetData()
	{
		$this->data=[];
		return $this;
	}
	public function setAdapter()
	{
		if(!$this->adapter){
			$adapter=new Adapter();
		}
		$this->adapter=new Adapter();
		return $this;
	}
	public function getAdapter()
	{
		if(!$this->adapter){
			$this->setAdapter();
		}
		return $this->adapter;
	}
	public function getPrimaryKey()
	{
		return $this->primaryKey;
	}
	public function setPrimaryKey($primaryKey){
		$this->primaryKey=$primaryKey;
		return $this;
	}
	public function setData(array $data)
	{
		$this->data=array_merge($this->data,$data);
		return $this;
	}

	public function getData()
	{
		return $this->data;
	}
	public function getTableName(){
		return $this->tableName;
	}

	public function setTableName($tableName){
		$this->tableName=$tableName;
		return $this;
	}
	public function __set($key,$value)
	{
		$this->data[$key]=$value;
		return $this;
	}
	public function __get($key)
	{
		if(array_key_exists($key, $this->data)){
			return $this->data[$key];
		}
		if(array_key_exists($key,$this->originalData))
		{
			return $this->originalData[$key];
		}
		return null;	
	}
	
	// public function save($query = null) {
	// 	if(!array_key_exists($this->getPrimaryKey(),$this->data))
	// 	{
	// 		unset($this->data[$this->getPrimaryKey()]);
	// 	}
	// 	if(!$this->data)
	// 	{
	// 		return false;
	// 	}
	// 	$id = (int)$this->{$this->getPrimaryKey()};
	// 	echo $id;
	// 	echo "<pre>";
	// 		print_r($this);
    //     if(!$query){
    //         if(!array_key_exists($this->{$this->getPrimaryKey()},$this->getData())){
    //             $keys = "`" . implode("`,`",array_keys($this->data)) . "`";
    //             $values = "'" . implode("','",$this->data) . "'";
    //             $query = "INSERT INTO `". $this->getTableName() ."` (". $keys . ") VALUES (". $values . ")";
    //             return $this->getAdapter()->insert($query);  
    //         }
    //         echo 1234;
    //         $args = [];
    //         foreach ($this->getData() as $key => $value) {
    //             $args[] = "`$key` = '$value'";
    //         }
    //         // array_shift($args);
    //         $query = "UPDATE `{$this->getTableName()}`  SET ".implode(",",$args) . " WHERE  `{$this->getPrimaryKey()}` = '{$id}'";
	// 		echo $query;
	// 		die();
    //     }
    //     return $this->getAdapter()->update($query);
    // }

	 public function save(){
		if(!array_key_exists($this->getPrimaryKey(),$this->data))
			{
				unset($this->data[$this->getPrimaryKey()]);
			}
			$id = (int)$this->{$this->getPrimaryKey()};
			if(!$id)
			{
				$key = implode(",", array_keys($this->data));
            $values = array_values($this->data);
            for ($i = 0; $i < count($values); $i++) 
			{
                $values[$i] = "'" . $values[$i] . "'";
            }

            $values = implode(",", $values);
            $query = "INSERT INTO `{$this->getTableName()}` ({$key}) VALUES ({$values})";
			$this->getAdapter()->Connection();
            $id = $this->getAdapter()->insert($query);
			}
			else {
				$keys = [];
				// $id = $this->data[$this->getPrimaryKey()];
				// array_shift($this->data);
				foreach ($this->data as $key => $value) {
					$keys[] = "`" . $key . "` = '" . $value . "'";
				}
				$keys = implode(",", $keys);
				$query = "UPDATE `{$this->getTableName()}` set {$keys} Where `{$this->getPrimaryKey()}`={$id}";
				echo $query;
				$this->getAdapter()->Connection();
				$this->getAdapter()->update($query);
			}
			$this->load($id);
			return $this;
		
	 }
      
	 public function update($query)
	{
		$row=$this->getAdapter()->update($query);
		if(!$row)
		{
			return false;
		}
		return $row;
	}
	
    public function load($value)
    {
    	$value=(int)$value;
    	$query="SELECT * FROM 
    			`{$this->getTableName()}` 
    			WHERE 
    			`{$this->getPrimaryKey()}`
    			=
    			'{$value}'";
    	 $result=$this->getAdapter()->fetchRow($query);
    	 if($result==null)
		 {
			 return false;
		 }
    	 $this->setOriginalData($result);
		$this->resetData();
    	return $this;
    }
	
	public function fetchAll($query=null)
	{
		$rowArray=[];
		if(!$query){
			$query="SELECT * FROM `{$this->getTableName()}`;";
		}
		$this->getAdapter()->connection();
		$rows=$this->getAdapter()->fetchAll($query);
		$collectionClassName=get_class($this).'\Collection';
		\Mage::loadFileByClassName($collectionClassName);
		$collection=new $collectionClassName();
		 foreach ($rows as $key => $value) {
            $key = new $this;
            $key->setOriginalData($value);

            $rowArray[] = $key;
        }
		// echo "<pre>";
		// print_r($rows);
	
		$collection->setData($rowArray);
		// unset($rowArray);
		return $collection;
	}


	public function fetchRow($query)
	{
		if(!$query)
		{
			$query="SELECT * FROM `{$this->getTableName}`
			WHERE `{$this->getPrimaryKey()}`={$value}";
		}
		$row=$this->getAdapter()->fetchRow($query);
		if(!$row)
		{
			return false;
		}
		$this->setOriginalData($row);
		$this->resetData();
		return $this;
	}
	public function delete($id = null) {
        if(!$id) {
            $id = $_GET['id'];
        } else {
            $id = (int)$id;
        }
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`=$id";
        return $this->getAdapter()->delete($sql);
    }

	// public function delete($id=null)
	// {
	// 	if($id==null){
	// 		if(!array_key_exists($this->getPrimaryKey(),$this->getData())){
	// 			return false;
	// 		}
	// 	}
	// 	$query="DELETE FROM 
	// 			`{$this->getTableName()}` 
	// 			WHERE 
	// 			`{$this->getPrimaryKey()}`
	// 			=
	// 			{$id}";
	// 	$id=$this->getAdapter()->delete($query);
	//  	return $this;
	// }


	public function getStatusOptions()
	{
		return[
			self::STATUS_DISABLED=>"Disabled",
			self::STATUS_ENABLED=>"Enabled"
		];
	}


	 public function status($id=null){
	 	$product=$this->getData();
	 	if($product['status']==0){
	 		$this->data['status']=1;
	 	}else{
	 		$this->data['status']=0;
	 	}
	 	$this->save();
	 }
	
}
