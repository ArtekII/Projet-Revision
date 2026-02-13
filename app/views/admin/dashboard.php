<?php $this->layout('layouts/admin', ['pageTitle' => $pageTitle]); ?>

<div class="container mt-4">

    <div class="card p-3 mb-3">
        <h5>Nombre d'utilisateurs inscrits</h5>
        <h2><?= $nbUsers ?></h2>
    </div>

    <div class="card p-3">
        <h5>Nombre d'échanges effectués</h5>
        <h2><?= $nbEchanges ?></h2>
    </div>

</div>
