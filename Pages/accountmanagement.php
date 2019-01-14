<?php
	if(isset($_GET['delete'])) {
		User::destroy($_GET['delete']);
	}

?>


<div class="container">

    <a class="btn btn-dark" style="margin:0px 0px 10px 20px; width:90px; height:40px;" <?= App::link('register') ?>>Register</a>

    <br><b>Users:</b><br><br>
<?php

$users = User::get();


	foreach($users as $user) {

	   echo '<div style="border: solid grey 2px"; class="col-sm-8">'. $user->firstname . " " . $user->lastname . " " . $user->docentnummer;?>

	       <a <?= App::link('edit&id=' . $user->id) ?> style="margin:10px; width:50px; height:35px;" class="btn btn-dark">Edit</a>
	       <a <?= App::link('accountmanagement&delete='.$user->id) ?> style="margin:10px; width:70px; height:35px;" class="btn btn-dark">Delete</a>
	       <a <?= App::link('overzicht&id='. $user->id) ?> style="margin:10px; width:120px; height:35px;" class="btn btn-dark">Reservering</a>

</div>

<?php } ?>



