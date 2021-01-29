<?php
session_start();
unset($_SESSION['username']);
// to unset session:-unset($_SESSION['varname'])
// unset all the sessions:-session_destroy();
?>