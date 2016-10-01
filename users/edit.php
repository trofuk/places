<?php
	$userID = intval($_GET['id']);
	if($userID == 0)
		die("Enter correct user id");
	if(!file_exists(ROOT_PATH.'/data/users/'.$userID.'.json'))
		die("User with provided id does not exist's");
	$fileContent = file_get_contents(ROOT_PATH.'/data/users/'.$userID.'.json');
	$fileDataAsArray = json_decode($fileContent, true);
?>
<form action="/users" method="GET">
	<input type="hidden" name="action" value="save">
	<input type="hidden" name="id" value="<?php echo $userID; ?>">

	<input type="text" name="city" placeholder="City" value="<?php echo $fileDataAsArray['city']; ?>">
	<br>
	<input type="number" step=any name="lat" placeholder="Latitude" value="<?php echo $fileDataAsArray['lat']; ?>">
	<br>
	<input type="number" step=any name="lng" placeholder="Longitude" value="<?php echo $fileDataAsArray['lng']; ?>">
	<br>
	<input type="text" name="desc" placeholder="Description" value="<?php echo $fileDataAsArray['desc']; ?>">
	<br>
	<button type="submit">Update</button>
</form>
