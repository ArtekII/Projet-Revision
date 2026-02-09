<?php $this->layout('layouts/admin', ['pageTitle' => $pageTitle]); ?>

<div class="row">
    <div class="col-lg-6">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin">Admin</a></li>
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin/categories">Catégories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nouvelle</li>
            </ol>
        </nav>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-plus-lg me-2"></i>Créer une nouvelle catégorie</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASE_URL ?>/admin/categories/store" method="POST">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de la catégorie <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control" 
                               id="nom" 
                               name="nom" 
                               placeholder="Ex: Électronique, Vêtements, Livres..."
                               required 
                               autofocus
                               maxlength="50">
                        <div class="form-text">Le nom doit être unique et ne pas dépasser 50 caractères.</div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> Créer la catégorie
                        </button>
                        <a href="<?= BASE_URL ?>/admin/categories" class="btn btn-outline-secondary">
                            <i class="bi bi-x-lg me-1"></i> Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
