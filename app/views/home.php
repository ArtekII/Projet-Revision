<?php $this->layout('layouts/main', ['pageTitle' => $pageTitle]); ?>

<div class="p-4 bg-light rounded-3 mb-4">
    <h1 class="h3">Takalo-Takalo</h1>
    <p class="mb-0">
        Plateforme d'échange d'objets entre utilisateurs.
    </p>
</div>

<?php if (isset($_SESSION['user'])): ?>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mes Objets</h5>
                    <p class="card-text">Gérez vos objets en vente ou en échange.</p>
                    <a href="#" class="btn btn-primary">Voir mes objets</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Proposer un échange</h5>
                    <p class="card-text">Découvrez les objets des autres utilisateurs.</p>
                    <a href="#" class="btn btn-success">Parcourir les objets</a>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body text-center py-5">
            <h5 class="card-title">Bienvenue sur Takalo-Takalo</h5>
            <p class="card-text">Inscrivez-vous pour commencer à échanger des objets!</p>
            <a href="<?= BASE_URL ?>/register" class="btn btn-success me-2">S'inscrire</a>
            <a href="<?= BASE_URL ?>/login" class="btn btn-primary">Se connecter</a>
        </div>
    </div>
<?php endif; ?>
