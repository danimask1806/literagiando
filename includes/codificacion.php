<?php 
	$permitted_chars = '01abcdefghij2345klmnopqrst6789uvwxyzABCD0123EFGHIJKLMNO4567PQRSTUVWXYZ89';
	echo '?2023'.substr(str_shuffle($permitted_chars), 0, 23).'=2023';
?>