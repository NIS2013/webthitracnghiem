<div id="test">
<?php echo isset($userdata['name'])?$userdata['name']:"noname"."</br>";
	echo $_SERVER['REQUEST_URI'] . "</br>"; 
	echo $_SERVER['PHP_SELF']."</br>";
	
	if(!empty($userdata['name'])) { echo $userdata['name']; } 
	?>
</div>