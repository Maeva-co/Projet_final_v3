CREATE DATABASE Final;

use Final;

CREATE TABLE membre (
    id_membre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    date_de_naissance DATE,  
    genre VARCHAR(20),
    email VARCHAR(100),
    ville VARCHAR(20),
    mot_de_passe VARCHAR(100),
    image_profil VARCHAR(50)
);

CREATE TABLE categorie_objet (
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(100)
);

CREATE TABLE objet (
    id_objet INT PRIMARY KEY AUTO_INCREMENT,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT
);

CREATE TABLE images_objet (
    id_image INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT,
    nom_image VARCHAR(100)
);

CREATE TABLE emprunt (
    id_emprunt INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE
);

INSERT INTO membre(nom, date_de_naissance, genre, email, ville, mot_de_passe, image_profil) VALUES
('Aaron', '1999-04-03','M', 'aaron@gmail.com','New York','abcd','default'),
('Adam', '2001-06-18','M', 'adam@gmail.com','London','abcd','default'),
('Juliette', '2002-12-21','F', 'juliette@gmail.com','Amsterdam','abcd','default'),
('Ella', '2004-08-12','F', 'ella@gmail.com','Paris','abcd','default');


INSERT INTO categorie_objet(nom_categorie) VALUES
('esthetique'), ('bricolage'), ('mecanique'), ('cuisine');


INSERT INTO objet(nom_objet, id_categorie, id_membre) VALUES
('poele','4','1'),
('fourchette','4','1'),
('couteau','4','1'), 
('pneu','3','1'), 
('moteur','3','1'), 
('capot','3','1'), 
('tourne-vis','2','1'), 
('poele','2','1'), 
('rasoir','1','1'),
('creme','1','1'),
('cuillere','4','2'),
('poele','4','2'),
('moule','4','2'),
('autoradio','3','2'),
('frein-disque','3','2'),
('ampoule','2','2'),
('prise','2','2'),
('vis','2','2'),
('costume','1','2'),
('lipstick','1','3'),
('vernis','1','3'),
('boucle','1','3'),
('fer a souder','2','3'),
('loquid','2','3'),
('pince','3','3'),
('tuyau','3','3'),
('mixer','4','3'),
('verre','4','3'),
('passoir','4','3'),
('gaz','4','4'),
('robinet','4','4'),
('eponge','4','4'),
('liquide vaisselle','4','4'),
('echapement','3','4'),
('tableau de bord','3','4'),
('cle','2','4'),
('fil','2','4'),
('bracelet','1','4'),
('bague','1','4');

INSERT INTO emprunt(id_objet, id_membre, date_emprunt, date_retour) VALUES
('1','1', '2005-06-04', '2028-12-27'),
('2','1', '2005-06-04', '2008-11-27'),
('3','2', '2005-02-04', '2008-05-27'),
('4','2', '2005-03-04', '2030-06-27'),
('5','3', '2005-04-04', '2008-12-27'),
('6','2', '2005-05-04', '2026-07-27'),
('7','3', '2005-01-04', '2008-08-27'),
('8','4', '2005-01-04', '2029-09-27'),
('9','4', '2005-09-04', '2008-10-27'),
('10','4', '2005-03-04', '2008-01-27');

CREATE OR REPLACE VIEW v_current_emprunt AS
SELECT * FROM emprunt WHERE date_retour > '2025-07-14';

INSERT INTO images_objet(id_objet, nom_image) VALUES 
('1', 'montre.jpeg'),
('2', 'montre.jpeg'),
('3', 'montre.jpeg'),
('4', 'montre.jpeg'),
('5', 'montre.jpeg'),
('6', 'montre.jpeg'),
('7', 'montre.jpeg'),
('8', 'montre.jpeg'),
('9', 'montre.jpeg'),
('10', 'montre.jpeg'),
('11', 'montre.jpeg'),
('12', 'montre.jpeg'),
('13', 'montre.jpeg'),
('14', 'montre.jpeg'),
('15', 'montre.jpeg'),
('16', 'montre.jpeg'),
('17', 'montre.jpeg'),
('18', 'montre.jpeg'),
('19', 'montre.jpeg'),
('20', 'montre.jpeg'),
('21', 'montre.jpeg'),
('22', 'montre.jpeg'),
('23', 'montre.jpeg'),
('24', 'montre.jpeg'),
('25', 'montre.jpeg'),
('26', 'montre.jpeg'),
('27', 'montre.jpeg'),
('28', 'montre.jpeg'),
('29', 'montre.jpeg'),
('30', 'montre.jpeg'),
('31', 'montre.jpeg'),
('32', 'montre.jpeg'),
('33', 'montre.jpeg'),
('34', 'montre.jpeg'),
('35', 'montre.jpeg'),
('36', 'montre.jpeg'),
('37', 'montre.jpeg'),
('38', 'montre.jpeg'),
('39', 'montre.jpeg'),
('40', 'montre.jpeg');

CREATE OR REPLACE VIEW v_image_objet AS
SELECT o.id_objet, i.nom_image FROM objet AS o JOIN images_objet AS i ON o.id_objet = i.id_objet;