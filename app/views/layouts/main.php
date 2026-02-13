<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Takalo-Takalo') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL ?>/">Takalo-Takalo</a>
            <div class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user'])): ?>
                    <span class="nav-link text-light">
                        Bonjour, <?= htmlspecialchars($_SESSION['user']['prenom'] ?? $_SESSION['user']['nom'] ?? 'Utilisateur') ?>
                    </span>
                    <a class="nav-link" href="<?= BASE_URL ?>/logout">Déconnexion</a>
                <?php else: ?>
                    <a class="nav-link" href="<?= BASE_URL ?>/register">Inscription</a>
                    <a class="nav-link" href="<?= BASE_URL ?>/login">Connexion</a>
                <?php endif; ?>
                <a class="nav-link" href="<?= BASE_URL ?>/admin">Admin</a>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?= $content ?>
        </div>
    </main>
</body>
</html>
