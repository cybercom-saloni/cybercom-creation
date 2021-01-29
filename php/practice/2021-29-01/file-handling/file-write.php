<?php
// file handling:-
// w:-write to a file	
// r:-read from a file	
// a:-append to a file

// fopen('filename','mode'):-to open file or create file.

//******create a file****************
$handle=fopen('file.txt', 'w');

// write data in the file fwrite()
fwrite($handle,'saloni');


// write multiple names in a file by next line
fwrite($handle,'saloni'."\n");
fwrite($handle,'maheshwari');

// fclose('filename'):-to close the file
fclose($handle);
echo "file compeleted";
?>