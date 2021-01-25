<?php
$day1='friday';
$day2='25-01-2021';
switch (
	$day1
	&& $day2
	) {
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