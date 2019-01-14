<?php

// App::pageAuth(['user'], "login");
// $user = App::getUser();
if($_GET['id']){
	$user = User::findById($_GET['id']);
}


// var_dump($user->firstname);

?>


 <br><br>

 <?php if(App::checkAuth(App::ROLE_USER)){?>
            <a class="btn btn-primary">&hearts; Like </a><br>
        <?php } ?>

	
<a <?= App::link('edit') ?> class="btn btn-primary">Edit</a>

<?php 
    echo "<hr>";
	echo $user->firstname." ".$user->lastname;
	echo "<hr>";
	echo $user->email;
	echo "<br>";
	echo "<hr>";
	echo $user->address;
	echo "<hr>";
	switch ($user->relation_status) {
               case "0":
               echo "Vrijgezel";
               break;
               case "1":
               echo "Relatie";
               break;
               case "2":
               echo "Gecompliceerd";
               break;
           }

?>

</div>

