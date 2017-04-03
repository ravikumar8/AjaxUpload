<?php
	include_once 'upload.php';

	$image = new Upload(
		array(
			'file' 			=> 'image'
		)
	);

	echo $image->process();
