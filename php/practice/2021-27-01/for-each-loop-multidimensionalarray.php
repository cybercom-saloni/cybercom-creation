<?php
$food=array('unhealthy' => array('pizza','pasta','noodles'),
			'healthy' => array('salad','vegetable','soup'));
foreach($food as $element => $arrayelement)
{
	foreach ($arrayelement as $item) {
		echo $item."<br>";
	}
}
?>