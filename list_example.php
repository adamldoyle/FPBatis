<html>
	<head>
		<title>fpBatis List Example</title>
	</head>
	<body>
		<p>
			<a href="list_example.php">List Example</a><br/>
			<a href="create_example.php">Create Example</a>
		</p>
<?php

require('fpbatis.php');
$fpBatis = new FPBatis('sqlMap.xml');
$fpBatis->setDebug(true);

$id = $_GET['id'];
if ($_GET['delete'] == 'country') {
	$fpBatis->doDelete('Countries.delete',array('id'=>$id));
} else if ($_GET['delete'] == 'state') {
	$fpBatis->doDelete('States.delete',array('id'=>$id));
} else if ($_GET['delete'] == 'city') {
	$fpBatis->doDelete('Cities.delete',array('id'=>$id));
}

$params = array();
$params['sort'] = 'country';
$params['sortDir'] = 'DESC';
$params['idList'] = array(1,2);
$allCountries = $fpBatis->doSelect('Countries.selectAll',$params);

echo '<ul>';
foreach ($allCountries as $country) {
	echo '<li>Id: ' . $country['id'] . '</li>';
	echo '<li>Country: ' . $country['country'] . '</li>';
	echo '<li><a href="create_example.php?edit=country&id=' . $country['id'] . '">Edit ' . $country['country'] . '</a></li>';
	echo '<li><a href="list_example.php?delete=country&id=' . $country['id'] . '">Delete ' . $country['country'] . '</a></li>';
	echo '<li style="padding-bottom: 20px;">States:<ul>';
	foreach ($country['states'] as $state) {
		echo '<li>Id: ' . $state['id'] . '</li>';
		echo '<li>State: ' . $state['state'] . '</li>';
		echo '<li><a href="create_example.php?edit=state&id=' . $state['id'] . '">Edit ' . $state['state'] . '</a></li>';
		echo '<li><a href="list_example.php?delete=state&id=' . $state['id'] . '">Delete ' . $state['state'] . '</a></li>';
		echo '<li style="padding-bottom: 20px;">Cities:<ul>';
		foreach ($state['cities'] as $city) {
			echo '<li>Id: ' . $city['id'] . '</li>';
			echo '<li>City: ' . $city['city'] . '</li>';
			echo '<li><a href="create_example.php?edit=city&id=' . $city['id'] . '">Edit ' . $city['city'] . '</a></li>';
			echo '<li style="padding-bottom: 20px;"><a href="list_example.php?delete=city&id=' . $city['id'] . '">Delete ' . $city['city'] . '</a></li>';
		}
		echo '</ul></li>';
	}
	echo '</ul></li>';
}
echo '</ul>';

?>

	</body>
</html>