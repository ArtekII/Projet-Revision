<?php

namespace app\controllers;

class AdminController
{
    private $db;
    private $view;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;
    }

    public function showLogin()
    {
        echo $this->view->render('admin/login', [
            'pageTitle' => 'Connexion Admin',
            'defaultLogin' => 'admin'
        ]);
    }

    public function login()
    {
        $login = trim($_POST['login'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($login === 'admin' && $password === 'admin') {
            $_SESSION['admin'] = true;
            header('Location: ' . BASE_URL . '/admin/dashboard');
            exit;
        } else {
            $_SESSION['error'] = 'Login admin incorrect.';
            header('Location: ' . BASE_URL . '/admin');
            exit;
        }
    }

    public function dashboard()
    {
        if (empty($_SESSION['admin'])) {
            header('Location: ' . BASE_URL . '/admin');
            exit;
        }

        $nbUsers = $this->db->query('SELECT COUNT(*) FROM utilisateur')
                            ->fetchColumn();

        $nbEchanges = $this->db->query("SELECT COUNT(*) FROM echange WHERE UPPER(statut)='ACCEPTE'")
                               ->fetchColumn();

        echo $this->view->render('admin/dashboard', [
            'pageTitle' => 'Dashboard',
            'nbUsers' => $nbUsers,
            'nbEchanges' => $nbEchanges
        ]);
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        $_SESSION['success'] = 'Déconnexion réussie.';
        header('Location: ' . BASE_URL . '/admin');
        exit;
    }
}
