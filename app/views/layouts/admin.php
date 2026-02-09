<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Administration') ?> - Takalo-Takalo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #212529;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.8);
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255,255,255,.1);
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #0d6efd;
        }
        .content {
            min-height: 100vh;
        }
        footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse py-3">
                <div class="position-sticky">
                    <a href="<?= BASE_URL ?>/admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <i class="bi bi-arrow-repeat me-2 fs-4"></i>
                        <span class="fs-4">Takalo-Takalo</span>
                    </a>
                    <hr class="text-white">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>/admin" class="nav-link">
                                <i class="bi bi-speedometer2 me-2"></i>
                                Tableau de bord
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/admin/categories" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/categories') !== false ? 'active' : '' ?>">
                                <i class="bi bi-tags me-2"></i>
                                Catégories
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/admin/users" class="nav-link">
                                <i class="bi bi-people me-2"></i>
                                Utilisateurs
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/admin/stats" class="nav-link">
                                <i class="bi bi-graph-up me-2"></i>
                                Statistiques
                            </a>
                        </li>
                    </ul>
                    <hr class="text-white">
                    <ul class="nav nav-pills flex-column">
                        <li>
                            <a href="<?= BASE_URL ?>/" class="nav-link">
                                <i class="bi bi-house me-2"></i>
                                Retour au site
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>/logout" class="nav-link text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Déconnexion
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?= htmlspecialchars($pageTitle ?? 'Administration') ?></h1>
                </div>

                <!-- Messages flash -->
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($_SESSION['success']) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($_SESSION['error']) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <!-- Content -->
                <?php echo $content; ?>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-3 mt-auto">
        <div class="container text-center">
            <p class="mb-0 text-muted">
                <strong>Takalo-Takalo</strong> - Projet de groupe<br>
                <small>
                    <!-- Ajoutez ici les noms et numéros ETU des membres du projet -->
                    ETU001 - Nom1 | ETU002 - Nom2 | ETU003 - Nom3
                </small>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
