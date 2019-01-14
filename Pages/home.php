<?php

App::pageAuth([App::ROLE_USER], "login");


if (isset($_POST['teruggave'])) {
    //
    $reservation = Reservation::addReservation($_POST);
    //
    if ($reservation) {
        App::redirect('succes');
    }
}
?>

<div class="container">
    <div class="card card-model card-model-sm">
        <div class="card-header">
            Register
        </div>
        <div class="card-body">
            <?= Reservation::reservationForm(); ?>
        </div>
    </div>
</div>
