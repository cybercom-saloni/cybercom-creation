<?php
$day='friday';
switch ($day) {
	case 'monday':
		echo '1st working day';
		break;
	case 'tuesday':
	case 'wednesday':
		echo 'working day';
		// no break;
	case 'friday':
		echo 'working day';
		return;
	case 'saturday':
	case 'sunday':
		echo 'closing days';
		break;
	default:
		echo 'not a day';
		break;
}
?>