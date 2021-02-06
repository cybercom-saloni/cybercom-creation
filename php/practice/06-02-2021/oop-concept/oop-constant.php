<?php
Class Circle{
	const pie=3.14;
	public function area($radius){
		return self::pie*($radius*$radius);
	}
}
$circle=new Circle;
echo $circle::pie;
echo "<br> THE AREA OF CIRCLE IS : ";
echo $circle->area(100);
?>