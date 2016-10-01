<html lang="en-US" ng-app="mapPositioningApp">
<head>
    <meta charset="UTF-8">
    <title>Places</title>
    <link rel="stylesheet" href="/users/styles.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsP0k8UH8jxyAdTWfx1ucIphPTzEJNU3k&callback"></script>
    <script src="/users/Libraries/angular.js"></script>
    <script src="/users/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
</head>
<body ng-controller="MapPositioning">

<?php
	$allFiles = scandir(ROOT_PATH.'/data/users');
	$jsonFiles = array_diff($allFiles, ['..', '.']);
	echo '<div class="list">';
	foreach($jsonFiles as $file)
	{
		$fileID = str_replace('.json', '', $file);
		$fileContent = file_get_contents(ROOT_PATH.'/data/users/' . $file);
		$fileContentAsJSON = json_decode($fileContent, true);
    echo '<div>';
    echo "ID: " . $fileID . "<br>";
		echo "City: " . $fileContentAsJSON['city'] . "<br>";
		echo "Latitude: " . $fileContentAsJSON['lat'] . "<br>";
		echo "Longitude: " . $fileContentAsJSON['lng'] . "<br>";
		echo "Description: " . $fileContentAsJSON['desc'] . "<br>";
		echo '<a href="/users/?action=delete&id='.$fileID.'" style="position: relative; z-index: 1;">Delete</a>';
		echo "&nbsp;&nbsp;&nbsp;";
		echo '<a href="/users/?action=edit&id='.$fileID.'" target="_blank" style="position: relative; z-index: 1;">Edit</a>';
		echo "&nbsp;&nbsp;&nbsp;";
		echo '<a href="/users/?action=view&id='.$fileID.'" target="_blank" style="position: relative; z-index: 1;">Show</a>';
		echo "&nbsp;&nbsp;&nbsp;";
		echo "<hr>";
    echo "</div>";
	}

?>

	<form id="edit" action="/users" method="GET">
		<input type="hidden" name="action" value="save">
		<input type="text" name="city" placeholder="City">
		<br>
		<input id="lat" type="number" step=any name="lat" placeholder="Latitude">
		<br>
		<input id="lng" type="number" step=any name="lng" placeholder="Longitude">
		<br>
		<input type="text" name="desc" placeholder="Description">
		<br>
		<button type="submit">Create</button>
	</form>

	</div>
		<div class="content">
        <div id="cities">
            <ul>
                <li ng-repeat="city in cities" ng-click="showCity(city)"></li>
            </ul>
        </div>

        <div id="map" ng-init="initialize()"></div>
    </div>


</body>
</html>
