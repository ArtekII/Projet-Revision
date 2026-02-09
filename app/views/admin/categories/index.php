<?php $this->layout('layouts/admin', ['pageTitle' => $pageTitle]); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="text-muted mb-0">Gérez les catégories d'objets disponibles sur la plateforme.</p>
    <a href="<?= BASE_URL ?>/admin/categories/create" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Nouvelle catégorie
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <?php if (empty($categories)): ?>
            <div class="text-center py-5">
                <i class="bi bi-tags display-1 text-muted"></i>
                <p class="mt-3 text-muted">Aucune catégorie n'a été créée pour le moment.</p>
                <a href="<?= BASE_URL ?>/admin/categories/create" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1"></i> Créer la première catégorie
                </a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 80px;">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col" style="width: 200px;" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= htmlspecialchars($category['id']) ?></td>
                                <td>
                                    <i class="bi bi-tag text-primary me-2"></i>
                                    <?= htmlspecialchars($category['nom']) ?>
                                </td>
                                <td class="text-end">
                                    <a href="<?= BASE_URL ?>/admin/categories/edit/<?= $category['id'] ?>" 
                                       class="btn btn-sm btn-outline-primary me-1" 
                                       title="Modifier">
                                        <i class="bi bi-pencil"></i> Modifier
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal<?= $category['id'] ?>"
                                            title="Supprimer">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </button>

                                    <!-- Modal de confirmation de suppression -->
                                    <div class="modal fade" id="deleteModal<?= $category['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirmer la suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <p>Êtes-vous sûr de vouloir supprimer la catégorie <strong>"<?= htmlspecialchars($category['nom']) ?>"</strong> ?</p>
                                                    <p class="text-danger mb-0"><small>Cette action est irréversible.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    <form action="<?= BASE_URL ?>/admin/categories/delete/<?= $category['id'] ?>" method="POST" class="d-inline">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="bi bi-trash me-1"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3 text-muted">
                <small>Total : <?= count($categories) ?> catégorie(s)</small>
            </div>
        <?php endif; ?>
    </div>
</div>
