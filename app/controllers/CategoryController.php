<?php

namespace app\controllers;

use app\models\Category;
use flight\Engine;

class CategoryController
{
    protected Engine $app;
    protected Category $categoryModel;

    public function __construct(Engine $app)
    {
        $this->app = $app;
        $this->categoryModel = new Category($app->db());
    }

    /**
     * Afficher la liste des catégories
     */
    public function index(): void
    {
        $categories = $this->categoryModel->getAll();
        $this->app->render('admin/categories/index', [
            'categories' => $categories,
            'pageTitle' => 'Gestion des Catégories'
        ]);
    }

    /**
     * Afficher le formulaire de création
     */
    public function create(): void
    {
        $this->app->render('admin/categories/create', [
            'pageTitle' => 'Nouvelle Catégorie'
        ]);
    }

    /**
     * Enregistrer une nouvelle catégorie
     */
    public function store(): void
    {
        $nom = trim($this->app->request()->data->nom ?? '');

        // Validation
        if (empty($nom)) {
            $_SESSION['error'] = 'Le nom de la catégorie est obligatoire.';
            $this->app->redirect(BASE_URL . '/admin/categories/create');
            return;
        }

        if ($this->categoryModel->existsByName($nom)) {
            $_SESSION['error'] = 'Une catégorie avec ce nom existe déjà.';
            $this->app->redirect(BASE_URL . '/admin/categories/create');
            return;
        }

        if ($this->categoryModel->create($nom)) {
            $_SESSION['success'] = 'Catégorie créée avec succès.';
            $this->app->redirect(BASE_URL . '/admin/categories');
        } else {
            $_SESSION['error'] = 'Erreur lors de la création de la catégorie.';
            $this->app->redirect(BASE_URL . '/admin/categories/create');
        }
    }

    /**
     * Afficher le formulaire de modification
     */
    public function edit(int $id): void
    {
        $category = $this->categoryModel->getById($id);

        if (!$category) {
            $_SESSION['error'] = 'Catégorie non trouvée.';
            $this->app->redirect(BASE_URL . '/admin/categories');
            return;
        }

        $this->app->render('admin/categories/edit', [
            'category' => $category,
            'pageTitle' => 'Modifier la Catégorie'
        ]);
    }

    /**
     * Mettre à jour une catégorie
     */
    public function update(int $id): void
    {
        $nom = trim($this->app->request()->data->nom ?? '');

        // Validation
        if (empty($nom)) {
            $_SESSION['error'] = 'Le nom de la catégorie est obligatoire.';
            $this->app->redirect(BASE_URL . '/admin/categories/edit/' . $id);
            return;
        }

        if ($this->categoryModel->existsByName($nom, $id)) {
            $_SESSION['error'] = 'Une catégorie avec ce nom existe déjà.';
            $this->app->redirect(BASE_URL . '/admin/categories/edit/' . $id);
            return;
        }

        if ($this->categoryModel->update($id, $nom)) {
            $_SESSION['success'] = 'Catégorie mise à jour avec succès.';
            $this->app->redirect(BASE_URL . '/admin/categories');
        } else {
            $_SESSION['error'] = 'Erreur lors de la mise à jour de la catégorie.';
            $this->app->redirect(BASE_URL . '/admin/categories/edit/' . $id);
        }
    }

    /**
     * Supprimer une catégorie
     */
    public function delete(int $id): void
    {
        if ($this->categoryModel->delete($id)) {
            $_SESSION['success'] = 'Catégorie supprimée avec succès.';
        } else {
            $_SESSION['error'] = 'Erreur lors de la suppression de la catégorie.';
        }
        $this->app->redirect(BASE_URL . '/admin/categories');
    }
}
