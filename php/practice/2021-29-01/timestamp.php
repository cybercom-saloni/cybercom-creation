<?php
echo time();
echo '<br>';
echo date('H:m:s',time());
echo '<br>';
echo date('h:m:s',time());
echo '<br>';
echo date('D:M:Y',time());
echo '<br>';
echo date('H:m:s @ d M Y',time());
echo '<br>';
echo date('H:m:s',strtotime('+1 hour'));
echo '<br>';
echo date('d:M:Y',strtotime('+1 month'));
echo '<br>';
echo date('d M Y @ H:m:s',strtotime('+1 week 1 hour 30 seconds'));
echo '<br>';
echo date('d:M:Y',strtotime('-1 month'));
echo '<br>';
echo date('d:M:Y @ H:i:s',time()-(7*24*60*60));
?>