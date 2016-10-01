<?php

	if($_GET['lat'] == '' || $_GET['lng'] == '')
	{
		echo "Bad parameters";
		die();
	}
	$inputArray = [
		'city' => $_GET['city'],
		'lat' => $_GET['lat'],
		'lng' => $_GET['lng'],
		'desc' => $_GET['desc'],
	];
	$inputArrayAsJSON = json_encode($inputArray);

	if(intval($_GET['id']) > 0)
	{
		$userID = intval($_GET['id']);
		if(!file_exists(ROOT_PATH.'/data/users/'.$userID.'.json'))
		die("User with provided id does not exist's");

			file_put_contents(ROOT_PATH.'/data/users/'.$userID.'.json', $inputArrayAsJSON);
			header('Location: /users');
			die();
		}



	$i = 1;
	while(file_exists(ROOT_PATH.'/data/users/'.$i.'.json'))
	{
		$i++;
	}
	file_put_contents(ROOT_PATH.'/data/users/'.$i.'.json', $inputArrayAsJSON);
	header('Location: /users');
