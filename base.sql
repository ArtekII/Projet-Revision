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

INSERT INTO utilisateur (nom, prenom, email, mot_de_passe) VALUES
('admin', 'admin', 'admin@gmail.com', '1234'),
('Rakoto', 'Jean', 'jean@gmail.com', '1234'),
('Rabe', 'Marie', 'marie@gmail.com', '1234'),
('Andry', 'Paul', 'paul@gmail.com', '1234');

INSERT INTO objet (titre, description, prix, id_utilisateur) VALUES
('Téléphone Samsung', 'Smartphone en bon état, 64Go', 300000, 2),
('Jean bleu', 'Jean taille 40, peu porté', 50000, 2),
('Livre Java', 'Apprendre Java pour débutants', 40000, 3),
('DVD Inception', 'Film original en très bon état', 30000, 3),
('Manette PS4', 'Manette officielle Sony', 150000, 4),
('Chaise en bois', 'Chaise solide pour bureau', 80000, 4);

-- Téléphone -> Électronique
INSERT INTO objet_categorie VALUES (1, 1);

-- Jean -> Vêtements
INSERT INTO objet_categorie VALUES (2, 2);

-- Livre Java -> Livres
INSERT INTO objet_categorie VALUES (3, 3);

-- DVD Inception -> DVD & Blu-ray
INSERT INTO objet_categorie VALUES (4, 4);

-- Manette PS4 -> Jeux vidéo
INSERT INTO objet_categorie VALUES (5, 5);

-- Chaise -> Mobilier
INSERT INTO objet_categorie VALUES (6, 6);


INSERT INTO photo (chemin) VALUES
('assets/images/telephone.jpg'),
('assets/images/jean.jpg'),
('assets/images/livre_java.jpg'),
('assets/images/dvd_inception.jpg'),
('assets/images/manette_ps4.jpg'),
('assets/images/chaise.jpg');

-- Echange en attente
INSERT INTO objet_photo VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

INSERT INTO echange (
    id_utilisateur1,
    id_utilisateur2,
    id_objet1,
    id_objet2,
    date_debut,
    statut
) VALUES (2, 3, 1, 3, NOW(), 'EN_ATTENTE');

-- Echange accepter
INSERT INTO echange (
    id_utilisateur1,
    id_utilisateur2,
    id_objet1,
    id_objet2,
    date_debut,
    date_fin,
    statut
) VALUES (3, 4, 4, 5, NOW() - INTERVAL 2 DAY, NOW(), 'ACCEPTE');
