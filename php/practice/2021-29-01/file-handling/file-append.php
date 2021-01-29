<?php
// added to the list
$handle=fopen('file.txt', 'a');
fwrite($handle,"\n".'abc'."\n");
fclose($handle);
?>