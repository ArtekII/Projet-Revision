<?php

namespace app\controllers;

class UserController
{
    private $db;
    private $view;

    public function __construct($db, $view)
    {
        $this->db = $db;
        $this->view = $view;
    }

    public function showRegister()
    {
        echo $this->view->render('auth/register', [
            'pageTitle' => 'Inscription'
        ]);
    }

    public function register()
    {
        $nom = trim($_POST['nom'] ?? '');
        $prenom = trim($_POST['prenom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($nom === '' || $email === '' || $password === '') {
            $_SESSION['error'] = 'Veuillez remplir les champs obligatoires.';
            header('Location: ' . BASE_URL . '/register');
            exit;
        }

        $check = $this->db->prepare('SELECT id FROM utilisateur WHERE email = ?');
        $check->execute([$email]);
        if ($check->fetch()) {
            $_SESSION['error'] = 'Cet email est déjà utilisé.';
            header('Location: ' . BASE_URL . '/register');
            exit;
        }

        $stmt = $this->db->prepare(
            'INSERT INTO utilisateur (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)'
        );

        $stmt->execute([
            $nom,
            $prenom,
            $email,
            password_hash($password, PASSWORD_DEFAULT)
        ]);

        $_SESSION['success'] = 'Inscription réussie. Connectez-vous.';
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    public function showLogin()
    {
        echo $this->view->render('auth/login', [
            'pageTitle' => 'Connexion'
        ]);
    }

    public function login()
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM utilisateur WHERE email = ?'
        );

        $stmt->execute([trim($_POST['email'] ?? '')]);

        $user = $stmt->fetch();
        $password = $_POST['password'] ?? '';
        $passwordFromDb = $user['mot_de_passe'] ?? '';
        $isHashed = is_string($passwordFromDb) && str_starts_with($passwordFromDb, '$2');
        $isValidPassword = $user && (
            ($isHashed && password_verify($password, $passwordFromDb))
            || (!$isHashed && hash_equals((string) $passwordFromDb, $password))
        );

        if ($isValidPassword) {
            $_SESSION['user'] = $user;
            header('Location: ' . BASE_URL);
            exit;
        } else {
            $_SESSION['error'] = 'Email ou mot de passe incorrect.';
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $_SESSION['success'] = 'Vous avez été déconnecté.';
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}
