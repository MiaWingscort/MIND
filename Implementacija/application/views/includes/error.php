<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php if( isset($info)): ?>
	<div class="alert alert-success">
		<strong>USPESNO!</strong><?php echo($info) ?>
	</div>
<?php elseif( isset($error)): ?>
	<div class="alert alert-danger">
		<strong>GRESKA!</strong><?php echo($error) ?>
	</div>
<?php endif; ?>
