<html>
	<head>
		<title>fpBatis Create Example</title>
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

if ($_GET['edit'] == 'country') {
	$country = $fpBatis->doSelect('Countries.select',$id);
	$country = $country[0];
} else if ($_GET['edit'] == 'state') {
	$state = $fpBatis->doSelect('States.select',$id);
	$state = $state[0];
} else if ($_GET['edit'] == 'city') {
	$city = $fpBatis->doSelect('Cities.select',$id);
	$city = $city[0];
} else if ($_GET['save'] == 'country') {
	$country = $fpBatis->doSaveForm('Countries');
	$id = $country['id'];
	echo 'Saved country with doSaveForm: ';
	print_r($country);
	echo '<hr/>';
} else if ($_GET['save'] == 'state') {
	$state = $fpBatis->doSave('States',array('state'=>$_POST['state'],'countryId'=>$_POST['countryId']));
	$id = $state['id'];
	echo 'Saved state with doSave: ';
	print_r($state);
	echo '<hr/>';
} else if ($_GET['save'] == 'city') {
	if ($_POST['id'] == -1)
		$city = $fpBatis->doInsert('Cities.insert',array('city'=>$_POST['city'],'stateId'=>$_POST['stateId']));
	else
		$city = $fpBatis->doUpdate('Cities.update',array('city'=>$_POST['city'],'stateId'=>$_POST['stateId'],'id'=>$_POST['id']));
	$id = $city['id'];
	echo 'Saved city with doInsert/doUpdate: ';
	print_r($city);
	echo '<hr/>';
}

if ($id == '')
	$id = -1;

if (($_GET['edit'] == null && $_GET['save'] == null) || $country != null) {
?>
		<form method="POST" action="create_example.php?save=country">
			<input type="hidden" name="id" id="id" value="<?=$id?>" />
			Country: <input type="text" name="country" id="country" <? if ($country != null) { ?> value="<?=$country['country']?>" <? } ?>/><br/>
			<input type="submit" value="Save"/>
		</form>
		<hr/>
<?
}
if (($_GET['edit'] == null && $_GET['save'] == null) || $state != null) {
?>
		<form method="POST" action="create_example.php?save=state">
			<input type="hidden" name="id" id="id" value="<?=$id?>" />
			State: <input type="text" name="state" id="state" <? if ($state != null) { ?> value="<?=$state['state']?>" <? } ?>/><br/>
			Country: <select name="countryId" id="countryId">
				<?
					foreach ($fpBatis->doSelect('Countries.selectAll',array('sort'=>'country')) as $country) {
						echo '<option value="' . $country['id'] . '"';
						if ($state != null && $state['countryId'] == $country['id'])
							echo ' selected="selected"';
						echo '>' . $country['country'] . '</option>';
					}
				?>
			</select><br/>
			<input type="submit" value="Save"/>
		</form>
		<hr/>
<?
}
if (($_GET['edit'] == null && $_GET['save'] == null) || $city != null) {
?>
		<form method="POST" action="create_example.php?save=city">
			<input type="hidden" name="id" id="id" value="<?=$id?>" />
			City: <input type="text" name="city" id="city" <? if ($city != null) { ?> value="<?=$city['city']?>" <? } ?>/><br/>
			State: <select name="stateId" id="stateId">
				<?
					foreach ($fpBatis->doSelect('States.selectAll',array('sort'=>'state')) as $state) {
						echo '<option value="' . $state['id'] . '"';
						if ($city != null && $city['stateId'] == $state['id'])
							echo ' selected="selected"';
						echo '>' . $state['state'] . '</option>';
					}
				?>
			</select><br/>
			<input type="submit" value="Save"/>
		</form>
<?
}
?>
	</body>
</html>