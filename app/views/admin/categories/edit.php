<?php $this->layout('layouts/admin', ['pageTitle' => $pageTitle]); ?>

<div class="row">
    <div class="col-lg-6">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin">Admin</a></li>
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/admin/categories">Catégories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modifier</li>
            </ol>
        </nav>

        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Modifier la catégorie</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASE_URL ?>/admin/categories/update/<?= $category['id'] ?>" method="POST">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de la catégorie <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control" 
                               id="nom" 
                               name="nom" 
                               value="<?= htmlspecialchars($category['nom']) ?>"
                               placeholder="Ex: Électronique, Vêtements, Livres..."
                               required 
                               autofocus
                               maxlength="50">
                        <div class="form-text">Le nom doit être unique et ne pas dépasser 50 caractères.</div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-check-lg me-1"></i> Enregistrer les modifications
                        </button>
                        <a href="<?= BASE_URL ?>/admin/categories" class="btn btn-outline-secondary">
                            <i class="bi bi-x-lg me-1"></i> Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info box -->
        <div class="card mt-4 border-info">
            <div class="card-body">
                <h6 class="card-title text-info"><i class="bi bi-info-circle me-2"></i>Information</h6>
                <p class="card-text small text-muted mb-0">
                    ID de la catégorie : <strong><?= $category['id'] ?></strong>
                </p>
            </div>
        </div>
    </div>
</div>
