<?php
Mage::loadFileByClassName('Model_Core_Adapter');
class Model_Core_Table{
	protected $primaryKey=null;
	protected $tableName=null;
	protected $adapter=null;
	protected $data=[];
	protected $status=null;
	const STATUS_ENABLED=1;
	const STATUS_DISABLED=0;

	public function setAdapter()
	{
		if(!$this->adapter){
			$adapter=new Model_Core_Adapter();
		}
		$this->adapter=new Model_Core_Adapter();
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
		if(!array_key_exists($key, $this->data)){
			return null;
		}
		return $this->data[$key];
	}

	 public function save(){
	 	if(array_key_exists($this->getPrimaryKey(),$this->getData())){
	 		// echo "array";
	 		$keys=[];
	 		foreach ($this->getData() as $key => $value) {
	 			$keys[]="`".$key."` = '".$value."'";
	 		}

	 		$id=$this->data[$this->getPrimaryKey()];

	 		$product=array_shift($keys);

	 		$keys=implode(',',$keys);
	 		$query="UPDATE 
	 				`{$this->getTableName()}`
	 			   SET 
	 			   	{$keys} 
	 			   	WHERE 
	 			   	{$product}";
	 	    $this->getAdapter()->update($query);
	 	}else{
			$keys=implode(",",array_keys($this->getData()));
		 	$values=array_values($this->getData());
		 	for($i=0;$i<count($values);$i++){
		 		$values[$i]="'".$values[$i]."'";
		 	}	
		 	$values=implode(",",$values);
		 	$query="INSERT INTO 
		 			`{$this->getTableName()}`
		 			 ({$keys}) 
		 			 VALUES
		 			 ({$values})";
		 	echo $query;
		 	$id=$this->getAdapter()->insert($query);
		 	echo $id;
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
    	 $this->setData($result);
		
    	return $this;
    }

	public function fetchAll($query=null)
	{
		$rowArray=[];
		if(!$query){
			$query="SELECT * FROM `{$this->getTableName()}`;";
		}
		$rows=$this->getAdapter()->fetchAll($query);
		$collectionClassName=get_class($this).'_Collection';
		$collection=Mage::getModel($collectionClassName);
		 foreach ($rows as $key => $value) {
            $key = new $this;
            $key->setData($value);
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
		$row=$this->getAdapter()->fetchRow($query);
		if(!$row)
		{
			return false;
		}
		$this->data=$row;
		return $this;
	}

	public function delete($id=null)
	{
		if($id==null){
			if(!array_key_exists($this->getPrimaryKey(),$this->getData())){
				return false;
			}
		}
		$query="DELETE FROM 
				`{$this->getTableName()}` 
				WHERE 
				`{$this->getPrimaryKey()}`
				=
				{$id}";
		$id=$this->getAdapter()->delete($query);
	 	return $this;
	}


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
?>