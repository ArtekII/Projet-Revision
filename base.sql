CREATE DATABASE takalo;
USE takalo;

CREATE TABLE categorie(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE utilisateur(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL
);

CREATE TABLE objet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description TEXT,
    prix DECIMAL(10,2),
    date_ajout DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id)
);

CREATE TABLE objet_categorie(
    id_objet INT,
    id_categorie INT,
    PRIMARY KEY (id_objet, id_categorie),
    FOREIGN KEY (id_objet) REFERENCES objet(id) ON DELETE CASCADE,
    FOREIGN KEY (id_categorie) REFERENCES categorie(id)
);

CREATE TABLE photo(
    id INT AUTO_INCREMENT PRIMARY KEY,
    chemin VARCHAR(100) NOT NULL
);

CREATE TABLE objet_photo(
    id_objet INT,
    id_photo INT,
    PRIMARY KEY (id_objet, id_photo),
    FOREIGN KEY (id_objet) REFERENCES objet(id) ON DELETE CASCADE,
    FOREIGN KEY (id_photo) REFERENCES photo(id) ON DELETE CASCADE
);

CREATE TABLE echange(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur1 INT,
    id_utilisateur2 INT,
    id_objet1 INT,
    id_objet2 INT,
    date_debut DATETIME,
    date_fin DATETIME,
    statut VARCHAR(20),
    FOREIGN KEY (id_utilisateur1) REFERENCES utilisateur(id),
    FOREIGN KEY (id_utilisateur2) REFERENCES utilisateur(id),
    FOREIGN KEY (id_objet1) REFERENCES objet(id),
    FOREIGN KEY (id_objet2) REFERENCES objet(id)
);


INSERT INTO utilisateur(nom, prenom, email, mot_de_passe) VALUES
('admin', 'admin', 'admin@gmail.com', '1234');

INSERT INTO categorie (nom) VALUES 
    ('Électronique'),
    ('Vêtements'),
    ('Livres'),
    ('DVD & Blu-ray'),
    ('Jeux vidéo'),
    ('Mobilier'),
    ('Sport & Loisirs'),
    ('Musique'),
    ('Jouets'),
    ('Autres');

