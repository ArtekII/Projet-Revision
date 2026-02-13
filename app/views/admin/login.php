<?php $this->layout('layouts/admin', ['pageTitle' => $pageTitle]); ?>

<div class="container mt-5">
    <h3>Connexion Admin</h3>

    <form method="POST" action="<?= BASE_URL ?>/admin/login">
        <input type="text" name="login" value="<?= htmlspecialchars($defaultLogin ?? 'admin') ?>" class="form-control mb-3" placeholder="Login">
        <input type="password" name="password" class="form-control mb-3" placeholder="Mot de passe">
        <button class="btn btn-primary">Connexion</button>
    </form>
</div>
