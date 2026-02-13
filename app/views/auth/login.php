<?php $this->layout('layouts/main', ['pageTitle' => $pageTitle]); ?>

<div class="container mt-5">
    <h3>Connexion</h3>

    <form method="POST" action="<?= BASE_URL ?>/login">
        <input type="email" name="email" placeholder="Email" class="form-control mb-3">
        <input type="password" name="password" placeholder="Mot de passe" class="form-control mb-3">
        <button class="btn btn-primary">Connexion</button>
    </form>
</div>
