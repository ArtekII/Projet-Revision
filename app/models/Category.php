<?php

namespace app\models;

use flight\database\PdoWrapper;

class Category
{
    private PdoWrapper $db;

    public function __construct(PdoWrapper $db)
    {
        $this->db = $db;
    }

    /**
     * Récupérer toutes les catégories
     */
    public function getAll(): array
    {
        $statement = $this->db->runQuery('SELECT * FROM categorie ORDER BY nom ASC');
        return $statement->fetchAll();
    }

    /**
     * Récupérer une catégorie par son ID
     */
    public function getById(int $id): ?array
    {
        $statement = $this->db->runQuery('SELECT * FROM categorie WHERE id = ?', [$id]);
        $result = $statement->fetch();
        return $result ?: null;
    }

    /**
     * Créer une nouvelle catégorie
     */
    public function create(string $nom): bool
    {
        try {
            $this->db->runQuery('INSERT INTO categorie (nom) VALUES (?)', [$nom]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    /**
     * Mettre à jour une catégorie
     */
    public function update(int $id, string $nom): bool
    {
        try {
            $this->db->runQuery('UPDATE categorie SET nom = ? WHERE id = ?', [$nom, $id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    /**
     * Supprimer une catégorie
     */
    public function delete(int $id): bool
    {
        try {
            $this->db->runQuery('DELETE FROM categorie WHERE id = ?', [$id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    /**
     * Vérifier si une catégorie existe par son nom
     */
    public function existsByName(string $nom, ?int $excludeId = null): bool
    {
        if ($excludeId) {
            $statement = $this->db->runQuery(
                'SELECT COUNT(*) as count FROM categorie WHERE nom = ? AND id != ?',
                [$nom, $excludeId]
            );
        } else {
            $statement = $this->db->runQuery(
                'SELECT COUNT(*) as count FROM categorie WHERE nom = ?',
                [$nom]
            );
        }
        $result = $statement->fetch();
        return $result['count'] > 0;
    }
}
