<?php
session_start();
echo "Welcome!!!".$_SESSION['username']." you are of ".$_SESSION['age'];	
?>