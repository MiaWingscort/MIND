
<?php
foreach ($nizUlaza as $ulaz) {
	echo "<li ";
	if($ulaz['active']==TRUE){
		echo  "class=\"active\"";
	}
	echo "><a href=\"" . $ulaz['adresa'] ."\">". $ulaz['naziv'] . "</a></li>";

	}
?>