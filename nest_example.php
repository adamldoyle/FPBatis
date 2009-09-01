<?

require('fpbatis.php');
$fpBatis = new FPBatis('sqlMap.xml');
$fpBatis->setDebug(true);

$nestings = $fpBatis->doSelect('Comments.selectByParent',array('objId'=>1));

function recurseTree($nestArry) {
	if (is_array($nestArry)) {
		echo "<div>\n";
		foreach ($nestArry as $nest) {
			echo "<div>Name: " . $nest['comment'] . "</div>\n";
			echo "<div style='padding-left: 50px;'>Subcomments: \n";
			recurseTree($nest['subcomments']);
			echo "</div>\n"; 
		}
		echo "</div>\n";
	}
}

recurseTree($nestings);

?>