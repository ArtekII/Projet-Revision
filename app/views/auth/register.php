<?php $this->layout('layouts/main', ['pageTitle' => $pageTitle]); ?>

<div class="container mt-5">
    <h3>Inscription</h3>

    <form method="POST" action="<?= BASE_URL ?>/register">
        <input type="text" name="nom" placeholder="Nom" class="form-control mb-3">
        <input type="text" name="prenom" placeholder="Prénom" class="form-control mb-3">
        <input type="email" name="email" placeholder="Email" class="form-control mb-3">
        <input type="password" name="password" placeholder="Mot de passe" class="form-control mb-3">
        <button class="btn btn-success">S'inscrire</button>
    </form>
</div>
