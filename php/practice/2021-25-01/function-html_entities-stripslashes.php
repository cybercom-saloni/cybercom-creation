<?php
$string='this is a <img src="image.jpeg">string.';
$string_slashes=htmlentities(addslashes($string));
echo stripslashes($string_slashes);

?>