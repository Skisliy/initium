<?php
	$file = 'process-id.txt';
	$current_id = file_get_contents($file);

	if ($current_id == '') {
		$command =  'gulp live' . ' > /dev/null 2>&1 & echo $!; ';
		$pid = exec($command, $output);
		file_put_contents($file, $pid);
		echo 'gulp: on';
	} else {
		$command =  'kill '.$current_id . ' > /dev/null 2>&1 & echo $!; ';
		$pid = exec($command, $output);
		file_put_contents($file, '');
		echo 'gulp: off';
	}
?>
